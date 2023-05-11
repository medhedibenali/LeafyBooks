<?php
require_once dirname(__FILE__, 2) . '/modules/autoloader.php';

$userRepo = new UserRepository();
// USED GET METHOD
$user = $userRepo->find(array("username" => $_GET['username']));

$bookRepo = new BookRepository();

$readActRepo = new ReadActRepository();
$toreadActs = $readActRepo->find(array("username" => $_GET['username'], 'status' => 'toread'));
$currentreadActs = $readActRepo->find(array("username" => $_GET['username'], 'status' => 'currentlyreading'));
$finishreadActs = $readActRepo->find(array("username" => $_GET['username'], 'status' => 'finishedreading'));

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $user->username ?></title>
</head>

<body>
    <h1><?= $user->username ?> INFO</h1>
    <table>
        <thead>
            <tr>
                <th>pic</th>
                <th>username</th>
                <th>first name</th>
                <th>last name</th>
                <th>bio</th>
                <th>join date</th>
                <th>birthday</th>
                <th>location</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="<?= $user->pic ?>" alt="image not found" width="100px" height="100px"></td>
                <td><?= $user->username ?></td>
                <td><?= $user->first_name ?></td>
                <td><?= $user->last_name ?></td>
                <td><?= $user->bio ?></td>
                <td><?= $user->joinDate ?></td>
                <td><?= $user->birthday ?></td>
                <td><?= $user->location ?></td>
            </tr>
        </tbody>
    </table>

    <?php if (!empty($toreadActs)) { ?>
        <?php $i = 0; ?>
        <h4> <?= $user->username ?> wants to read</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>author</th>
                    <th>publisher</th>
                    <th>picture</th>
                    <th>publishing year</th>
                    <th>rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($toreadActs as $toreadAct) {
                    $book = $bookRepo->find(array("isbn" => $toreadAct->isbn))
                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->publisher ?></td>
                        <td><img src="<?= $book->description ?>" alt="image not found" width="100px" height="100px" </td>
                        <td><?= $book->publishing_year ?></td>
                        <td><?= $book->rating ?></td>
                        <td><?= $toreadAct->addDate ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h1><?= $user->username ?> has not added any books</h1>
    <?php } ?>

    <?php if (!empty($currentreadActs)) { ?>
        <?php $i = 0; ?>
        <h4> <?= $user->username ?> is currently reading</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>author</th>
                    <th>publisher</th>
                    <th>picture</th>
                    <th>publishing year</th>
                    <th>rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentreadActs as $currentreadAct) {
                    $book = $bookRepo->find(array("isbn" => $currentreadAct->isbn))
                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->publisher ?></td>
                        <td><img src="<?= $book->description ?>" alt="image not found" width="100px" height="100px" </td>
                        <td><?= $book->publishing_year ?></td>
                        <td><?= $book->rating ?></td>
                        <td><?= $currentreadAct->addDate ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h1><?= $user->username ?> is not currently reading any books</h1>
    <?php } ?>

    <?php if (!empty($finishreadActs)) { ?>
        <?php $i = 0; ?>
        <h4> <?= $user->username ?> finished reading</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>author</th>
                    <th>publisher</th>
                    <th>picture</th>
                    <th>publishing year</th>
                    <th>rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($finishreadActs as $finishreadAct) {
                    $book = $bookRepo->find(array("isbn" => $finishreadAct->isbn))
                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->publisher ?></td>
                        <td><img src="<?= $book->description ?>" alt="image not found" width="100px" height="100px" </td>
                        <td><?= $book->publishing_year ?></td>
                        <td><?= $book->rating ?></td>
                        <td><?= $finishreadAct->addDate ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h1><?= $user->username ?> has not finished any books</h1>
    <?php } ?>

</body>

</html>