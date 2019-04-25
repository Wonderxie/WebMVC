<?php
    class View extends MyObject {
        
        protected $args;
        protected $templateNames;

        // '$templateNames' is the array that stocks the templates' names
        // '$args' is the array that stocks the arguments of the current request under this controller
        public function __construct($controller, $templateName, $args = array()) {
            parent::__construct();

            $this->templateNames = array();
            $this->templateNames['head'] = 'head';
            //$this->templateNames['menu'] = 'menu';
            $this->templateNames['content'] = $templateName;
			
			if (($templateName != 'login') && ($templateName != 'inscription')) {
				$this->templateNames['top'] = 'menu';
				$this->templateNames['foot'] = 'foot';			
			}

            $this->args = $args;
            $this->args['controller'] = $controller;
            $this->args['view'] = $this;
        }

        public function setArg($key, $val) {
            $this->args[$key] = $val;
        }

        public function render() {
            $this->loadTemplate($this->templateNames['head'], $this->args);
            //$this->loadTemplate($this->templateNames['menu'], $this->args);
			if ((isset($this->templateNames['top'])) && (isset($this->templateNames['foot']))) {
				$this->loadTemplate($this->templateNames['top'], $this->args);
				$this->loadTemplate($this->templateNames['content'], $this->args);
				$this->loadTemplate($this->templateNames['foot'], $this->args);			
			}
			else {
				$this->loadTemplate($this->templateNames['content'], $this->args);
			}
        }

        public function loadTemplate($name, $args=NULL) {
            $templateFileName = __ROOT_DIR . '/templates/'. $name . 'Template.php';
            if (is_readable($templateFileName)) {
                if(isset($args))
                    foreach($args as $key => $value)
                        $$key = $value;
                require_once($templateFileName);
            } else {
                throw new Exception('undefined template "' . $name .'"');
            }

            //print_r($args);

            // if (isset($args)) {
            //     foreach($args as $key => $value){
            //         $$key = $value;
            //    }
            // }
            // require_once($name);
        }

    //     public function templatesSearchPaths() {
    //         // paths are ordered and will be prefixed by templates/
    //        //Vide pour le moment
    //        return array('');
    //     }
   
    //     // load template named $name according the templatesSearchPaths()
    //    public function loadTemplate($name, $args=NULL) {
    //         $templateSearchPaths = $this->templatesSearchPaths();
    //         $templateFileName = null;
    //         $i = -1;
   
    //         do {
    //             $i++;
    //             $templateFileName = __ROOT_DIR . '/templates/'. $templateSearchPaths[$i] . $name . 'Template.php';
    //         } while(!is_readable($templateFileName) && $i<count($templateSearchPaths));
   
    //         if(!is_readable($templateFileName)){
    //             throw new Exception('Undefined template named "' . $name .'"');
    //        }
   
    //        //Affiche le nom du template load
    //         $this->log('Load template: ' . $templateSearchPaths[$i] . $name . 'Template.php');
   
    //         $this->loadTemplateFileNamed($templateFileName,$args);
    //    }
    }
?>