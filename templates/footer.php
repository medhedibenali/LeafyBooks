<?php

$scripts = array_merge(
    $scripts ?? [],
    array(
        'js/scroll-to-top.js',
        'js/header.js',
        array(
            'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',
            'integrity' => 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe',
            'crossorigin' => 'anonymous'
        )
    )
);

require dirname(__FILE__) . '/base-footer.php';
