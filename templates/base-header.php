<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $pageTitle ?> </title>
    <?php
    foreach ($stylesheets ?? [] as $stylesheet) {
        if (is_array($stylesheet)) {
    ?>
            <link rel="stylesheet" <?php
                                    foreach ($stylesheet as $key => $value) {
                                        echo "$key=\"$value\" ";
                                    }
                                    ?>>
        <?php
        } else {
        ?>
            <link rel="stylesheet" href=<?= $stylesheet ?>>
    <?php
        }
    }
    ?>
</head>

<body>