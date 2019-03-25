<?php
    class UserController extends Controller {
        
        protected $user;
        
        public function __construct($request) {
            parent::__construct($request);
            session_start();
            $userId = NULL;
            if(($request->has('user'))) {
                $userId = $request->read('user');
            }     
            if (!is_null($userId)) {
                $this->user = User::getWithId($userId);
            }
        }

        public function defaultAction($request) {
            $view = new View($this, 'userProfile', array('user'=> $this->user));
            $view->render();
        }

        public function showHome($request) {
            $view = new View($this, 'index', array('user' => $this->user));
            $view->render();
        }
        
        // // action of showing user profile
        // public function profile($args) {
        //     $v = new UserView($this);
        //     $v->renderProfile();
        // }
    }
?>