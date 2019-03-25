<?php
    abstract class Controller extends MyObject {
        
        protected $request;
        
        public function __construct($request) {
            $this->request = $request;
        }

        public abstract function defaultAction($request);

        // action
        public function execute() {
            $actionNameToExecute = $this->request->getActionName();
            $this->$actionNameToExecute($this->request);
        }
    }
?>