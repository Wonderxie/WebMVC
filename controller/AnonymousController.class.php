<?php
    class AnonymousController extends Controller {
        
        public function __construct($request) {
            parent::__construct($request);

            // if (!empty($_POST['inscLogin']) && !empty($_POST['inscPassword'])) {
            //     $this->validateInscription($request);
            // }
        }

        public function defaultAction($request) {
            // echo "It works!";
            $view = new View($this, 'index');
            $view->render();
        }

        public function inscription($request) {
            //require(__ROOT_DIR . "/classes/DatabasePDO.class.php");
            $view = new View($this, 'inscription');
            //$response = new Response();
            //$response->interceptEchos();
            $view->render();
            //return $response;
        }

        public function validateInscription($request) {
            if(!empty($_POST['inscLogin']) && !empty($_POST['inscPassword']) && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
                $login = $request->read('inscLogin');
                if (User::isLoginUsed($login)) {
                    $view = new View($this, 'inscription');
                    $view->setArg('inscErrorText', 'This login is already used');
                    $view->render();
                } else {
                    $password = $request->read('inscPassword');
                    $mail = $request->read('mail');
                    $nom = $request->read('nom');
                    $prenom = $request->read('prenom');
                    $user = User::create($login, $password, $mail, $prenom, $nom);
                    if (!isset($user)) {
                        $view = new View($this, 'inscription');
                        $view->setArg('inscErrorText', 'Cannot complete inscription');
                        $view->render();
                    } else {
                        $id = $user->id();
                        $newRequest = new Request();
                        $newRequest->write('controller', 'user');
                        $newRequest->write('action', 'defaultAction');
                        $newRequest->write('user', $id);
                        //$newRequest->write('user', $login);
                        //Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
                        $controller = Dispatcher::dispatch($newRequest);
                        $controller->execute();
                    }
                }
            } else {
                $view = new View($this,'inscription');
		        $view->render();
            }
        }

        public function login($request) {
            $view = new View($this, 'login');
            $view->render();
        }

        public function validateLogin($request) {
            if(!empty($_POST['logLogin']) && !empty($_POST['logPassword'])) {
                $login = $request->read('logLogin');
                $password = $request->read('logPassword');
                if(!User::isLoginSuccess($login, $password)){
                    $view = new View($this,'login');
                    $view->setArg('logErrorText', 'Wrong login or password');
                    $view->render();
                } else { 
                    $newRequest = new Request();
                    $user = User::tryLogin($login, $password);
                    $id = $user->id();
                    $newRequest->write('controller', 'user');
                    $newRequest->write('action', 'defaultAction');
                    $newRequest->write('user', $id);
                    $newRequest->write('login', $login);
                    $newRequest->writePOST('pwd', $password);
                    // $newRequest->writePOST('user', $user['USER_LOGIN']);
				    // $newRequest->writePOST('userProfile', '1');
                    //Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
                    $controller = Dispatcher::dispatch($newRequest);
                    $controller->execute();
                }
            }
        }
    }
?>