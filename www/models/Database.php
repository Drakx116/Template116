<?php

abstract class Database
{
    // ACCES A LA BASE DE DONNEES

    protected static $_database;
    private static $_dsn;
    private static $_name;
    private static $_password;


    // INITIE LA CONNEXION
    private static function connect()
    {
        self::$_dsn = 'mysql:host=localhost;dbname=template116;';
        self::$_name = 'root';
        self::$_password = '';
        self::$_database = new PDO(self::$_dsn, self::$_name, self::$_password);
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    // RETOURNE L'ATTRIBUT $_database PERMETTANT LES REQUETES
    protected function getDatabase()
    {
        if(!self::$_database)
        {
            self::connect();
        }
        return self::$_database;
    }
}