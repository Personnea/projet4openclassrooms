<?php

Class ModeleBdd{

    private static $dns;
    private static $user;
    private static $password;
    protected static $connection;

    function connection() {
        self::$dns = "mysql:host=localhost;dbname=projet4";
        self::$user = "root";
        self::$password = "";
        self::$connexion = self::init();
    }

    function init() {
        self::$connection = new PDO( self::$dns, self::$user, self::$password );
        return self::$connexion;
        
    }

}