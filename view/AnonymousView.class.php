<?php
    class AnonymousView extends View {
        
        public function __construct($controller, $templateName, $args = array()) {
            parent::__construct($this, $templateName, $args);
        }

        // public function render() {
            
        // }
    }
?>