<?php

    class Dispatcher extends MyObject {
        
        // Dispatch the right name according to the current controller
        public static function dispatch($request) {
            $controllerName = ucfirst($request->getControllerName()) . 'Controller';
            $controller = new $controllerName($request);

            return $controller;
        }
    }
?>