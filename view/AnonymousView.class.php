<?php
    class AnonymousView extends View {
        
        public function __construct($controller, $templateName, $args) {
            parent::__construct($this, 'index', $args);
        }

        // public function render() {
            
        // }
    }
?>