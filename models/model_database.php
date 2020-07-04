<?php

Class ModelDatabase{

    private static $dns;
    private static $user;
    private static $password;
    protected static $connexion;

    function __construct() {
        self::$dns = "mysql:host=localhost;dbname=projet4";
        self::$user = "root";
        self::$password = "";
        self::$connexion = self::init();
    }

    function init() {
        self::$connexion = new PDO( self::$dns, self::$user, self::$password );
        return self::$connexion;
    }

    

}