<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$readActRepository = new ReadActRepository();

$isbn = $_POST['isbn'] ?? '';
$status = $_POST['answer'] ?? 'invalid_status';

$options = array(
    'currently_reading',
    'finished_reading',
    'to_read',
    ''
);

$username = $_SESSION['username'] ?? '';

$lastPage = $_SERVER['HTTP_REFERER'] ?? '../index.php';

if ($isbn === '' || $username === '' || !in_array($status, $options)) {
    header('Location: ' . $lastPage);
    die();
}

$criteria = ['isbn' => $isbn, 'username' => $username];

$startDate = null;
$finishDate = null;

date_default_timezone_set('Africa/Tunis');

if ($status === 'currently_reading') {
    $startDate = date('Y-m-d H:i:s');
} else if ($status === 'finished_reading') {
    $finishDate = date('Y-m-d H:i:s');
}

if ($status === '') {
    $readActRepository->delete($criteria);
    header('Location: ' . $lastPage);
    die();
}

$readAct = $readActRepository->find($criteria);

if ($status === 'finished_reading') {
    $startDate = $readAct->start_date ?? $finishDate;
}

$input = ['status' => $status, 'start_date' => $startDate, 'finish_date' => $finishDate];

if ($readActRepository->find($criteria) === false) {
    $readActRepository->insert(array_merge($criteria, $input));

    header('Location: ' . $lastPage);
    die();
}

$readActRepository->update($criteria, $input);

header('Location: ' . $lastPage);
