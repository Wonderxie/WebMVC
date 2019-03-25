<?php
    class Model extends MyObject {
        
        // public static function exec($sql){
        //     $pdo = DatabasePDO::getCurrentPDO();
        //     $st = $pdo->query($sql) or die("sql query error ! request : " . $sql);
        //     $st->setFetchMode(PDO::FETCH_ASSOC);
        //     return $st;
        // }

        

        protected static function db() {
            return DatabasePDO::getCurrentPDO();
        }

        protected static function exec($sql) {
            $st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
            $st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            return $st;
        }

        // protected $props;

        // public function __construct($props = array()) {
        //     $this->props = $props;
        // }

        // public function __get($prop) {
        //     return $this->props[$prop];
        // }

        // public function __set($prop, $val) {
        //     $this->props[$prop] = $val;
        // }
    }
?>