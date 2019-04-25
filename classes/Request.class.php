<?php
    class Request extends MyObject {
        
        // Create the instance of the class
        protected static $singleton = NULL;

        // Apply the Design Pattern 'Singleton' in this class (only have one instance)
        public static function getCurrentRequest() {
            if (!isset(static::$singleton)) {
                static::$singleton = new static();
            }
            return static::$singleton;
        }

        // Get the current controller's name
        public function getControllerName() {
            if (!isset($_GET['controller'])) {
                return 'Anonymous';
            } else {
                return $_GET['controller'];
            }
        }

        // Get the current action under this controller
        public function getActionName() {
            if (!isset($_GET['action'])) {
                return 'defaultAction';
            } else {
                return $_GET['action'];
            }
        }

        public function read($field) {
            if (isset($_POST[$field])) {
                return $_POST[$field];
            } 
            // else {
            //     $_POST = array($field => '');
            //     return $_POST[$field];
            // }
            else if (isset($_GET[$field])) {
                return $_GET[$field];
            } 
            // else {
            //     $_GET = array($field => '');
            //     return $_GET[$field];
            // }
            else {
                return NULL;
            }
        }

        public function write($field, $var) {
            $_GET[$field] = $var;
        }

        public function writePOST($field, $var) {
            $_POST[$field] = $var;
        }
		
		/*public function writeSESSION($field, $var) {
            $_SESSION[$field] = $var;
        }*/

        public function has($field) {
            if (!empty($_POST[$field]) || !empty($_GET[$field])){
                return true;
            }
            return false;
        }
    }
?>