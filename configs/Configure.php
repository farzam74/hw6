<?php

namespace configure;



class Configure
{



    
    private static $DB_ADDRESS='127.0.0.1';
    private static $DB_PORT='3306';
    private static $DB_USER='root';
    private static $DB_PASSWORD='';
    private static $DB_NAME='library';
    public static $pdo;
    public static  Configure $configure;


    public function __cunstruct()
    {
        self::$configure=$this;
    }


    public static function dsn(){

        return sprintf("mysql:host=%s;dbname=%s;charset=UTF8", self::$DB_ADDRESS, self::$DB_NAME);

    } 

    public static function connect(){

        $dsn=self::dsn();
   
        try {
            $pdo = new \PDO($dsn, self::$DB_USER, self::$DB_PASSWORD);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$pdo=$pdo;
        
        
        
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }




}

