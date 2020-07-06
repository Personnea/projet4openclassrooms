<?php

Class ModelDatabase{

    private static $dns;
    private static $user;
    private static $password;
    protected static $connexion;

    function __construct() {
        self::$dns = "mysql:host=db5000608848.hosting-data.io;dbname=dbs584963";
        self::$user = "dbu719497";
        self::$password = "Jesuisunepatate30*";
        self::$connexion = self::init();
    }

    function init() {
        self::$connexion = new PDO( self::$dns, self::$user, self::$password );
        return self::$connexion;
    }

    

}