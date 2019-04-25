<?php
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // Debug
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    // define (__DEBUG, false);
    define ('__DEBUG', true);

    if(__DEBUG) {
        error_reporting(E_ALL);
        ini_set("display_errors", E_ALL);
    } else {
        error_reporting(0);
        ini_set("display_errors", 0);
    }

    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // DB
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    if($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs'){
        define('_localhost','localhost');
        define('_dbname','thomas_bizet');
        define('_user','root');
        define('_password','root');
    }
    else{
        define('_localhost','localhost');
        define('_dbname','thomas_bizet');
        define('_user','thomas.bizet');
        define('_password','fXvmKcIE');
    }
?>
