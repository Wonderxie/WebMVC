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
            $view = new AnonymousView($this, 'login');
            $view->render();
        }

        public function inscription($request) {
            //require(__ROOT_DIR . "/classes/DatabasePDO.class.php");
            $view = new AnonymousView($this, 'inscription');
            //$response = new Response();
            //$response->interceptEchos();
            $view->render();
            //return $response;
        }

        public function validateInscription($request) {
            if(!empty($_POST['inscPassword1']) && !empty($_POST['inscPassword2']) && !empty($_POST['inscMail']) && !empty($_POST['inscNom']) && !empty($_POST['inscPrenom']) && !empty($_POST['inscType']) && !empty($_POST['inscMatricule']) && !empty($_POST['inscPseudo'])) {
                //Pour un étudiant
				if (($request->read('inscType') == "Etudiant") && !empty($_POST['inscPromo'])) {
					$request->writePOST('inscMatiere', '0');
					$login = $request->read('inscMail');
					if (User::isLoginUsed($login)) {
						$view = new AnonymousView($this, 'inscription');
						$view->setArg('inscErrorText', 'Cette adresse mail est déjà utilisée');
						$view->render();
					} else {
						$password1 = $request->read('inscPassword1');
						$password2 = $request->read('inscPassword2');
						$nom = $request->read('inscNom');
						$prenom = $request->read('inscPrenom');
						$type = $request->read('inscType');
						$matricule = $request->read('inscMatricule');
						$matiere = $request->read('inscMatiere');
						$promo = $request->read('inscPromo');
						$pseudo = $request->read('inscPseudo');
					
						if ($password1 != $password2) {
							$view = new AnonymousView($this, 'inscription');
							$view->setArg('inscErrorText', 'Mots de passe différents');
							$view->render();
						} else {
							$pwd = $password1;
							$user = User::create($nom, $prenom, $login, $type, $pwd, $matricule, $matiere, $promo, $pseudo);
					
							if (!isset($user)) {
								$view = new AnonymousView($this, 'inscription');
								$view->setArg('inscErrorText', 'L\'inscription ne peut pas être complétée');
								$view->render();
							} else {
								$id = $user->id();
								$newRequest = new Request();
								$newRequest->write('controller', 'user');
								$newRequest->write('action', 'defaultAction');
								$newRequest->writePOST('user', $id);
								$this->ConnexionEtLancementSession($user, 'Inscription');
								//$newRequest->write('user', $login);
								//Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
								$controller = Dispatcher::dispatch($newRequest);
								$controller->execute();
							}
						}
					}
				}
				//Pour un enseignant
				elseif (($request->read('inscType') == "Enseignant") && !empty($_POST['inscMatiere'])) {
					$request->writePOST('inscPromo', '0');
					$login = $request->read('inscMail');
					if (User::isLoginUsed($login)) {
						$view = new AnonymousView($this, 'inscription');
						$view->setArg('inscErrorText', 'Cette adresse mail est déjà utilisée');
						$view->render();
					} else {
						$password1 = $request->read('inscPassword1');
						$password2 = $request->read('inscPassword2');
						$nom = $request->read('inscNom');
						$prenom = $request->read('inscPrenom');
						$type = $request->read('inscType');
						$matricule = $request->read('inscMatricule');
						$matiere = $request->read('inscMatiere');
						$promo = $request->read('inscPromo');
						$pseudo = $request->read('inscPseudo');
					
						if ($password1 != $password2) {
							$view = new AnonymousView($this, 'inscription');
							$view->setArg('inscErrorText', 'Mots de passe différents');
							$view->render();
						} else {
							$pwd = $password1;
							$user = User::create($nom, $prenom, $login, $type, $pwd, $matricule, $matiere, $promo, $pseudo);

							if (!isset($user)) {
								$view = new AnonymousView($this, 'inscription');
								$view->setArg('inscErrorText', 'L\'inscription ne peut pas être complétée');
								$view->render();
							} else {
								$id = $user->id();
								$newRequest = new Request();
								$newRequest->write('controller', 'user');
								$newRequest->write('action', 'defaultAction');
								$newRequest->writePOST('user', $id);
								$this->ConnexionEtLancementSession($user, 'Inscription');
								//$newRequest->write('user', $login);
								//Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
								$controller = Dispatcher::dispatch($newRequest);
								$controller->execute();
							}
						}
					}
				}
				else {
                	$view = new AnonymousView($this,'inscription');
		        	$view->render();
				}  
			} else {
                $view = new AnonymousView($this,'inscription');
		        $view->render();
            }
        }

        public function login($request) {
            $view = new AnonymousView($this, 'login');
            $view->render();
        }
		
		public function validateLogin($request) {
            if(!empty($_POST['logLogin']) && !empty($_POST['logPassword'])) {
                $login = $request->read('logLogin');
                $password = $request->read('logPassword');
                if(!User::isLoginSuccess($login, $password)){
                    $view = new AnonymousView($this,'login');
                    $view->setArg('logErrorText', 'Mauvais login ou mot de passe');
                    $view->render();
                } else { 
                    $newRequest = new Request();
                    $user = User::tryLogin($login, $password);
                    $id = $user->id();
					$type = $user->type();
                    $newRequest->write('controller', 'user');
                    $newRequest->write('action', 'defaultAction');
                    $newRequest->write('user', $id);
                    $newRequest->write('login', $login);
					$newRequest->write('type', $type);
                    $newRequest->writePOST('pwd', $password);
					$this->ConnexionEtLancementSession($user, 'Inscription');
                    // $newRequest->writePOST('user', $user['USER_LOGIN']);
				    // $newRequest->writePOST('userProfile', '1');
                    //Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
                    $controller = Dispatcher::dispatch($newRequest);
                    $controller->execute();
				}
            }
        }

		public function ConnexionEtLancementSession($user, $string) {
                session_start();
                $_SESSION['userId'] = $user->id();
				$_SESSION['userNom'] = $user->nom();
				$_SESSION['userPrenom'] = $user->prenom();
				$_SESSION['userType'] = $user->type();
				$_SESSION['userMail'] = $user->mail();
                //header("Location: index.php?controller=user&action=content$string");
				$_SESSION['userMatricule'] = $user->matricule();
                $_SESSION['userPromo'] = $user->promo();
                $_SESSION['userMatiere'] = $user->matiere();
                $_SESSION['userPassword'] = $user->password();
                $_SESSION['userPseudo'] = $user->pseudo();
        }
    }
?>