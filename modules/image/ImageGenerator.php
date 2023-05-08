<?php

function lumDiff(int $R1, int $G1, int $B1, int $R2, int $G2, int $B2): float
{
    $L1 = 0.2126 * pow($R1 / 255, 2.2) +
        0.7152 * pow($G1 / 255, 2.2) +
        0.0722 * pow($B1 / 255, 2.2);

    $L2 = 0.2126 * pow($R2 / 255, 2.2) +
        0.7152 * pow($G2 / 255, 2.2) +
        0.0722 * pow($B2 / 255, 2.2);

    if ($L1 > $L2) {
        return ($L1 + 0.05) / ($L2 + 0.05);
    } else {
        return ($L2 + 0.05) / ($L1 + 0.05);
    }
}

function generateColor(int $red, int  $green, int $blue): array
{
    do {
        $newRed = mt_rand(0, 255);
        $newGreen = mt_rand(0, 255);
        $newBlue = mt_rand(0, 255);
    } while (lumDiff($red, $green, $blue, $newRed, $newGreen, $newBlue) <= 5);

    return array(
        'red' => $newRed,
        'green' => $newGreen,
        'blue' => $newBlue
    );
}

function encodeColor(int $red, int $green, int $blue): string
{
    $red = str_pad(dechex($red & 0xff), 2, '0', STR_PAD_LEFT);
    $green = str_pad(dechex($green & 0xff), 2, '0', STR_PAD_LEFT);
    $blue = str_pad(dechex($blue & 0xff), 2, '0', STR_PAD_LEFT);

    return $red . $green . $blue;
}

function decodeColor(string $color): array
{
    $color = hexdec($color) & 0xffffff;

    $red = ($color & 0xff0000) >> 16;
    $green = ($color & 0x00ff00) >> 8;
    $blue = $color & 0x0000ff;

    return array(
        'red' => $red,
        'green' => $green,
        'blue' => $blue
    );
}

function isValidBlueprint(int $blueprint): bool
{
    $upperMask = 0b11011;
    $lowerMask = $upperMask << 9;
    $middleMask = 0o44444;

    $upper = $blueprint & $upperMask;
    $lower = $blueprint & $lowerMask;
    $middle = $blueprint & $middleMask;

    return !($upper === 0 || $upper === $upperMask ||
        $lower === 0 || $lower === $lowerMask ||
        $middle === 0 || $middle === $middleMask
    );
}

function generateBlueprint(): int
{
    do {
        $blueprint = mt_rand(0, (1 << 15) - 1);
    } while (!isValidBlueprint($blueprint));

    return $blueprint;
}

function encodeBlueprint(int $blueprint): string
{
    $blueprint = $blueprint & 0o77777;

    return str_pad(dechex($blueprint), 4, '0', STR_PAD_LEFT);
}

function decodeBlueprint(string $blueprint): int
{
    $blueprint = str_pad($blueprint, 4, '0', STR_PAD_LEFT);
    $blueprint = substr($blueprint, -4);

    return hexdec($blueprint);
}

function createImage(array $bg, array $fg, int $blueprint): GdImage
{
    $imageSide = 420;
    $tileSide = $imageSide / 6;
    $padding = $tileSide / 2;

    $rows = 5;
    $totalColumns = 5;
    $columns = 3;

    $image = imagecreatetruecolor($imageSide, $imageSide);
    $bg = imagecolorallocate($image, $bg['red'], $bg['green'], $bg['blue']);
    imagefill($image, 0, 0, $bg);

    $fg = imagecolorallocate($image, $fg['red'], $fg['green'], $fg['blue']);

    for ($i = 0; $i < $rows; $i++) {
        $y1 = $padding + $i * $tileSide;
        $y2 = $y1 + $tileSide - 1;
        for ($j = 0; $j < $columns; $j++) {
            if (!($blueprint & 1)) {
                $blueprint >>= 1;
                continue;
            }
            $blueprint >>= 1;

            $x1 = $padding + $j * $tileSide;
            $x2 = $x1 + $tileSide - 1;
            imagefilledrectangle($image, $x1, $y1, $x2, $y2, $fg);

            if ($j === 2) {
                continue;
            }

            $x1 = $padding + ($totalColumns - $j - 1) * $tileSide;
            $x2 = $x1 + $tileSide - 1;
            imagefilledrectangle($image, $x1, $y1, $x2, $y2, $fg);
        }
    }

    return $image;
}

function encodeSeed(array $bg, array $fg, int $blueprint): string
{
    $bg = encodeColor(...$bg);
    $fg = encodeColor(...$fg);
    $blueprint = encodeBlueprint($blueprint);

    return $bg . $fg . $blueprint;
}

function decodeSeed(string $seed): array
{
    $seed = str_pad($seed, 16, '0', STR_PAD_LEFT);
    $seed = substr($seed, -16);

    $colorLength = 6;

    $bg = substr($seed, 0, $colorLength);
    $fg = substr($seed, $colorLength, $colorLength);
    $blueprint = substr($seed, 2 * $colorLength);

    $bg = decodeColor($bg);
    $fg = decodeColor($fg);
    $blueprint = decodeBlueprint($blueprint);

    return array(
        'bg' => $bg,
        'fg' => $fg,
        'blueprint' => $blueprint
    );
}

function generateSeed(): string
{
    $bg = array(
        'red' => 240,
        'green' => 240,
        'blue' => 240
    );
    $fg = generateColor(...$bg);
    $blueprint = generateBlueprint();

    $seed = encodeSeed($bg, $fg, $blueprint);
    return $seed;
}

function generateImage(string $seed): string
{
    $seed = decodeSeed($seed);
    $image = createImage(...$seed);
    $tempPath = tempnam(sys_get_temp_dir(), 'IMG');

    imagewebp($image, $tempPath, 100);

    return $tempPath;
}
