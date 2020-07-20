<?php

Class ModelDatabase{

    private static $dns;
    private static $user;
    private static $password;
    protected static $connexion;

    function __construct() {
        self::$dns = "mysql:host=;dbname=";
        self::$user = "";
        self::$password = "";
        self::$connexion = self::init();
    }

    function init() {
        self::$connexion = new PDO( self::$dns, self::$user, self::$password );
        return self::$connexion;
    }

    

}