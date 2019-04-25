<?php

    class Dispatcher extends MyObject {
        
        // Dispatch the right name according to the current controller
        public static function dispatch($request) {

            if (isset($_SESSION)) {
                // $newRequest = new Request();
                $request->write('controller', 'user');
            }

            $controllerName = ucfirst($request->getControllerName()) . 'Controller';
            if (!class_exists($controllerName)) {
                throw new Exception("$controllerName does not exist");
            }
            
            $controller = new $controllerName($request);

            return $controller;
        }
    }
?>