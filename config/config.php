<?php

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "web_project_db",
            "username" => "web_project_user",
            "password" => "password",
            "host" => "localhost",
        )
    ),
    // "urls" => array(
    // 	"baseUrl" => "http://example.com"
    // ),
    // "paths" => array(
    // 	"resources" => "/path/to/resources",
    // 	"images" => array(
    // 		"content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
    // 		"layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
    // 	)
    // )
);

/* 
Creating constants for heavily used paths makes things a lot easier. 
ex. require_once(LIBRARY_PATH . "Paginator.php") 
*/
defined("MODULES_PATH")
    or define("MODULES_PATH", realpath(dirname(__FILE__) . '/modules'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
/* 
Error reporting. 
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRICT);
