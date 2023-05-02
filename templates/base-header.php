<!DOCTYPE html>
<html lang="en">

<head>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
            <link rel="stylesheet" href="<?= $stylesheet ?>">
    <?php
        }
    }
    ?>
</head>

<body>
