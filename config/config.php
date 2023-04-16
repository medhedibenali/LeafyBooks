<?php

/**
 * This code is used to connect to the database.
 * $config is an array of database configuration.
 * $config['db'] is an array of database configurations.
 * $config['db']['db1'] is the database configuration for db1.
 * $config['db']['db1']['dbname'] is the database name.
 * $config['db']['db1']['username'] is the database username.
 * $config['db']['db1']['password'] is the database password.
 * $config['db']['db1']['host'] is the database host.
 */

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "web_project_db",
            "username" => "web_project_user",
            "password" => "password",
            "host" => "localhost"
        )
    )
);

/**
 * Creating constants for heavily used paths makes things a lot easier. 
 * ex. require_once(LIBRARY_PATH . "Paginator.php")
 */

defined("MODULES_PATH")
    or define("MODULES_PATH", realpath(dirname(__FILE__, 2) . '/modules'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__, 2) . '/templates'));
/**
 * Error reporting.
 */
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRICT);
