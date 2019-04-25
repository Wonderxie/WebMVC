<?php
    class DatabasePDO extends MyObject{
        
        protected static $pdo = NULL;
        
        // protected static $localhost="localhost";
        // protected static $dbname = "TP3MVC";
        // protected static $user = "root";
        // protected static $password = "root";

        // protected static $localhost="localhost";
        // protected static $dbname = "thomas_bizet";
        // protected static $user = "thomas.bizet";
        // protected static $password = "fXvmKcIE";
        
        public static function getCurrentPDO(){
            if(!isset(self::$pdo)) {
                try {
                    self::$pdo= new PDO("mysql:host="._localhost.";dbname="._dbname, _user, _password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                }
                catch(PDOexception $e) {
                    $e->getMessage();
                }
            }
            return self::$pdo;
        }
    }
?>