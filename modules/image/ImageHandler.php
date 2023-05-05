<?php

require_once dirname(__FILE__) . '/ImageGenerator.php';

function presentProblem(array $image): string|false
{
    // Check file size
    if ($image['size'] > 500000) {
        return 'Sorry, your file is too large.';
    }

    // Check if image file is a actual image or fake image
    $check = getimagesize($image['tmp_name']);
    if ($check === false) {
        return 'File is not an image.';
    }

    // File info 
    $fileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');

    if (!in_array($fileType, $allowTypes)) {
        return 'Sorry, only JPG, PNG, JPEG, GIF & WEBP files are allowed to upload.';
    }

    return false;
}

function loadImage(string $source): GdImage|false
{
    // Get image info 
    $imageInfo = getimagesize($source);
    $mime = $imageInfo['mime'];

    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    return $image;
}

function newPath(string $image, string $ext = 'webp'): string
{
    $sha1 = sha1_file($image);
    $path = substr($sha1, 0, 2)
        . '/'
        . substr($sha1, 2, 38)
        . uniqid('', true)
        . '.'
        . $ext;
    return $path;
}

function compressImage(string $source, string $destination, int $quality = 80): string
{
    $image = loadImage($source);

    // Save image 
    $success = imagewebp($image, $destination, $quality);

    if (!$success) {
        return false;
    }

    // Return compressed image 
    return $destination;
}

function saveImage(?array $image, string $basePath, ?string $seed = null): array|false
{
    $seed = $seed ?? generateSeed();

    if (!empty($image['name'] ?? array())) {
        $result = presentProblem($image);

        if ($result !== false) {
            $_SESSION['error'] = $result;
            return false;
        }

        $image = $image['tmp_name'];
    } else {
        $image = generateImage($seed);
    }

    $seperator = '/';
    $separators = array('/', '\\');
    if (in_array(substr($basePath, -1), $separators)) {
        $seperator = '';
    }

    $imagePath = newPath($image);

    $folder = explode('/', $imagePath, 2)[0];
    $folderPath = $basePath . $seperator . $folder;

    if (!is_dir($folderPath)) {
        mkdir($folderPath);
    }

    $path = $basePath . $seperator . $imagePath;
    $tempPath = $image;

    $image = compressImage($image, $path);
    unlink($tempPath);

    if ($image === false) {
        $_SESSION['error'] = 'Image upload failed.';
        return false;
    }

    return array(
        'image' => $imagePath,
        'image_seed' => $seed
    );
}
