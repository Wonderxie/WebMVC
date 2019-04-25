<?php
    class UserView extends View {
        
        public function __construct($controller, $templateName, $args = array()) {
            parent::__construct($controller, $templateName, $args);
            // $this->templateNames['menu'] = 'userMenu';
            // $this->templateNames['top'] = 'userTop';
            if(!$this->args['user']) {
                print_r($this->args);
                throw new Exception('a user must be defined');
            }
            else {
                print_r($this->args);
            }
        }

        public function renderProfile() {
            $this->templateNames['content'] = 'userProfile';
        }
    }
?>