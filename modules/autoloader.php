<?php

spl_autoload_register(function ($class) {
    $base = dirname(__FILE__);
    $scan = scandir($base);
    foreach ($scan as $element) {
        $path = "$base/$element";
        if (!is_dir($path)) {
            continue;
        }
        $file = "$path/$class.php";
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
    return false;
});
