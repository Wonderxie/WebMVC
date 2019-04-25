<?php
    class UserController extends Controller {
        
        protected $user;
        
        public function __construct($request) {
            parent::__construct($request);
			if (!isset($_SESSION['userId'])) {
				session_start();
			}
            $userId = NULL;
            if(($request->has('user'))) {
                $userId = $request->read('user');
            }     
            if (!is_null($userId)) {
                $this->user = User::getWithId($userId);
            }
        }

        public function defaultAction($request) {
			if ($_SESSION['userType'] == 'Etudiant') {
				$view = new View($this, 'accueilEtudiant', array('user'=> $this->user));
				$view->render();
			}
			else {
				$view = new View($this, 'accueilEnseignant', array('user'=> $this->user));
				$view->render();
			}
        }

        public function showHome($request) {
            $view = new View($this, 'index', array('user' => $this->user));
            $view->render();
        }
		
		public function deconnexion($request) {
			session_unset();
			session_destroy();
			$view = new View('Anonymous', 'login');
			$view->render();
		}
		
		// public function creationQuestionnaire($request) {
        //     $view = new View($this, 'creerQuestionnaire');
        //     $view->render();
        // }
			
		// //creation de questionnaire
		// public function validateCreation($request) {
		// 	if (!empty($_POST['questTitre']) && !empty($_POST['questDescription']) && !empty($_POST['questDateouv']) && !empty($_POST['questDateferm']) && !empty($_POST['questModeacces']) && !empty($_POST['questId']) && !empty($_POST['questMail']) && !empty($_POST['questNbquest']) && !empty($_POST['questRetourarriere']) && !empty($_POST['questTag']) && !empty($_POST['questType'])) {
		// 		$questId = $request->read('questId');
		// 		if (Questionnaire::isIdUsed($questId)) {
		// 			$view = new View($this, 'creerQuestionnaire');
		// 			$view->setArg('questErrorText', 'Cet identifiant de questionnaire est déjà utilisé');
		// 			$view->render();
		// 		} else {
		// 			$titre = $request->read('questTitre');
		// 			$description = $request->read('questDescription');
		// 			$date_ouv = $request->read('questDateouv');
		// 			$date_ferm = $request->read('questDateferm');
		// 			$mode_acces = $request->read('questModeacces');
		// 			$mail = $request->read('questMail');
		// 			$nb_qu = $request->read('questNbquest');
		// 			$retour_arriere = $request->read('questRetourarriere');
		// 			$tag = $request->read('questTag');
		// 			$type = $request->read('questType');
					
		// 			$avancement = 'non corrigé';
		// 			$generation = 'non aléatoire';
					
		// 			$questionnaire = Questionnaire::create($titre, $description, $date_ouv, $date_ferm, $mode_acces, $avancement, $questId, $mail, $nb_qu, $retour_arriere, $tag, $generation, $type);
				
		// 			if (!isset($questionnaire)) {
		// 				$view = new View($this, 'creerQuestionnaire');
		// 				$view->setArg('questErrorText', 'La création ne peut pas être complétée');
		// 				$view->render();
		// 			} else {
		// 				$id = $questionnaire->id();
		// 				$newRequest = new Request();
		// 				$newRequest->write('controller', 'questionnaire');
		// 				$newRequest->write('action', 'afficherInfoQuestionnaire');
		// 				$newRequest->writePOST('questionnaire', $id);
		// 				//$newRequest->write('user', $login);
		// 				//Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
		// 				$controller = Dispatcher::dispatch($newRequest);
		// 				$controller->execute();
		// 			}
		// 		}
		// 	}
		// }
				
		public function creationQuestion($request) {
			$view = new View($this, 'creerQuestion');
            $view->render();
		}
		
		public function validateQuestion($request) {
			if (!empty($_POST['questionType']) && !empty($_POST['questionnaireId']) && !empty($_POST['questionTag']) && !empty($_POST['questionContenu']) && !empty($_POST['questionBaremebon']) && !empty($_POST['questionBaremefaux']) && !empty($_POST['tempsMax'])) {
					
				$type = $request->read('questionType');
				$questionnaireId = $request->read('questionnaireId');
				$tag = $request->read('questionTag');
				$contenu = $request->read('questionContenu');
				$baremeBon = $request->read('questionBaremebon');
				$baremeFaux = $request->read('questionBaremefaux');
				$tempsMax = $request->read('tempsMax');
						
				/*$question = */Question::create($type, $tag, $contenu);
				$numQuestion = Question::numDerniereQuestion();	
				$lienFormulaire = AppartientA::create($questionnaireId, $numQuestion, $baremeBon, $baremeFaux, $tempsMax);
						
				if (/*(!isset($question)) || */(!isset($lienFormulaire))) {
					$view = new View($this, 'creerQuestion');
					$view->setArg('inscErrorText', 'La création ne peut pas être complétée');
					$view->render();
				} else {
					$newRequest = new Request();
					$newRequest->write('controller', 'user');
					$newRequest->write('action', 'creationReponse');
					$newRequest->write('question', $numQuestion);
					//$newRequest->write('user', $login);
					//Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
					$controller = Dispatcher::dispatch($newRequest);
					$controller->execute();
				}
			}
		}
		
		public function afficherInfoQuestionnaire($request) {
			$id = $request->read('id');
			$questionnaire = new Questionnaire();
			$questionnaire->getWithId($id);
			$view = new View($this, 'infoQuestionnaire');
            $view->render();
		}
			
		/*public function creationQuestion($request) {
			$view = new View($this, 'accueilEnseignant', array('user'=> $this->user));
			$view->render();
		}*/
		
		/*public function userQuestionnaires ($request) {
			$login = $_SESSION['mail'];
			$questionnaires = Questionnaire::getQuestionnaires($login);
			$_SESSION['userQuestionnaires'] = $questionnaires;	
			var_dump($_SESSION['userQuestionnaires']);
		}*/
		
		public function creationReponse($request) {
			$view = new View($this, 'accueilEnseignant');
			$view->render();
		}

		public function profil($request) {
			$view = new View($this, 'profil');
			$view->render();
		}
		
		public function editerProfil($request) {
			$view = new View($this, 'editerProfil');
            $view->render();
		}	
		
		public function validateEdition($request) {
			$mail = $_SESSION['userMail'];
			if (!empty($_POST['profilNom'])) {
				$nom = $request->read('profilNom');
				$nom = User::modify_nom($nom, $mail);
				$_SESSION['userNom'] = $nom->nom();
				if (!isset($nom)) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Nom non modifé');
							$view->render();
				}
			}
			if (!empty($_POST['profilPrenom'])) {
				$prenom = $request->read('profilPrenom');
				$prenom = User::modify_prenom($prenom, $mail);
				$_SESSION['userPrenom'] = $prenom->prenom();
				if (!isset($prenom)) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Prenom non modifé, veuillez réessayer');
							$view->render();
				}
			}
			if (!empty($_POST['profilMatricule'])) {
				$matricule = $request->read('profilMatricule');
				$matricule = User::modify_matricule($matricule, $mail);
				$_SESSION['userMatricule'] = $matricule->matricule();
				if (!isset($matricule)) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Matricule non modifé, veuillez réessayer');
							$view->render();
				}
			}
			if ((!empty($_POST['profilPassword1'])) && (!empty($_POST['profilprofilPassword2']))) {
				$password1 = $request->read('profilPassword1');
				$password2 = $request->read('profilPassword2');
				if ($password1 != $password2) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Mots de passe différents');
							$view->render();
						}
						
				else {
					$password = $password1;
					$password = User::modify_password($password, $mail);
					$_SESSION['userPassword'] = $password->password();
					if (!isset($password)) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Mot de passe non modifé, veuillez réessayer');
							$view->render();
					}
				}
			}
			if (!empty($_POST['profilPseudo'])) {
				$pseudo = $request->read('profilPseudo');
				$pseudo = User::modify_pseudo($pseudo, $mail);
				$_SESSION['userPseudo'] = $pseudo->pseudo();
				if (!isset($pseudo)) {
							$view = new View($this, 'profil');
							$view->setArg('inscErrorText', 'Pseudo non modifé, veuillez réessayer');
							$view->render();
				}
			}
			$newRequest = new Request();
			$newRequest->write('controller', 'user');
		    $newRequest->write('action', 'defaultAction');
			$newRequest->write('user', $mail);
			//$newRequest->write('user', $login);
			//Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
			$controller = Dispatcher::dispatch($newRequest);
		    $controller->execute();			
		}
	}
	
	
?>