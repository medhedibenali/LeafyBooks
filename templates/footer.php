<?php

$scripts = array_merge(
    $scripts ?? [],
    array("js/scrollTop.js",'js/header.js')
);

require dirname(__FILE__) . '/base-footer.php';
