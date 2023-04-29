<?php
require_once dirname(__FILE__, 3) . '/config/config.php';

class ConnexionDB
{
    private static $_bdd = null;

    private function __construct()
    {
        $dbconfig = Config::$config['db']['db1'];
        try {
            self::$_bdd = new PDO("mysql:host=" . $dbconfig['host'] . ";dbname=" . $dbconfig['dbname'] . ";charset=utf8", $dbconfig['username'], $dbconfig['password']);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance(): ?PDO
    {
        if (!self::$_bdd) {
            new ConnexionDB();
        }
        return (self::$_bdd);
    }
}
