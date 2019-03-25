<?php
    // Load my root class
    require_once(__ROOT_DIR . '/classes/MyObject.class.php');
    
    class AutoLoader extends MyObject {
    
        public function __construct() {
            spl_autoload_register(array($this, 'load'));
        }

        // This method will be automatically executed by PHP whenever it encounters
        // an unknown class name in the source code
        private function load($className) {
            // if it's just for 1 class:
            /*
            if (!is_readable($className)) {
                require_once(__ROOT_DIR . '/classes/' . ucfirst($className) .'.class.php');
            } else {
                echo 'The file is not readable';
            }
            
            $this->log(__CLASS__ . ' load: ' . $className);
            */

            $paths = array('/classes/', '/model/', '/controller/', '/view/');
            $fileToLoad = null;
            $i = 0;

            do {
                $fileToLoad = __ROOT_DIR . $paths[$i] . ucfirst($className) . '.class.php';
                $i++;
            } while (!is_readable($fileToLoad) && $i < count($paths));

            if (!is_readable($fileToLoad)) {
                throw new Exception('Unknown class ' . $className);
            }

            require_once($fileToLoad);
            
            if (strlen(strstr($fileToLoad, '/model/')) > 0) {
                $fileToLoad = __ROOT_DIR . '/sql/' . ucfirst($className) . 'sql.php';
                if (is_readable($fileToLoad)) {
                    require_once($fileToLoad);
                    $this->log(__CLASS__ . ' load: ' . ucfirst($className) . 'sql.php');
                }
            }
        }
    }

    $__LOADER = new AutoLoader();
?>