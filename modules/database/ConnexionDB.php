<?php

class ConnexionDB
{
    private static $_dbname = "web_project_db";
    private static $_user = "web_project_user";
    private static $_pwd = "password";
    private static $_host = "localhost";

    private static $_bdd = null;

    private function __construct()
    {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd);
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
