<?php
    class QuestionnaireController extends Controller {
        protected $questionnaire;
        
        public function __construct($request) {
            parent::__construct($request);
            if (!isset($_SESSION)) {
                session_start();
            }
            $questId = NULL;
            if(($request->has('questionnaire'))) {
                $questId = $request->read('questionnaire');
            }     
            if (!is_null($questId)) {
                $this->questionnaire = Questionnaire::getWithId($questId);
            }
        }

        public function defaultAction($request) {
            $view = new View($this, 'infoQuestionnaire', array('questionnaire' => $this->questionnaire));
            $view->render();
        }

        public function creationQuestionnaire($request) {
            $view = new View($this, 'creerQuestionnaire');
            $view->render();
        }

        public function validateQuestionnaire($request) {
            if (!empty($_POST['questTitre']) && !empty($_POST['questDescription']) && !empty($_POST['questDateouv']) && !empty($_POST['questDateferm']) && !empty($_POST['questModeacces']) && !empty($_POST['questId']) && !empty($_POST['questMail']) && !empty($_POST['questNbquest']) && !empty($_POST['questRetourarriere']) && !empty($_POST['questTag']) && !empty($_POST['questType'])) {
                $questId = $request->read('questId');
                if (Questionnaire::isIdUsed($questId)) {
                    $view = new View($this, 'creerQuestionnaire');
                    $view->setArg('questErrorText', 'Cet identifiant de questionnaire est déjà utilisé');
                    $view->render();
                } else {
                    $titre = $request->read('questTitre');
                    $description = $request->read('questDescription');
                    $date_ouv = $request->read('questDateouv');
                    $date_ferm = $request->read('questDateferm');
                    $mode_acces = $request->read('questModeacces');
                    $mail = $request->read('questMail');
                    $nb_qu = $request->read('questNbquest');
                    $retour_arriere = $request->read('questRetourarriere');
                    $tag = $request->read('questTag');
                    $type = $request->read('questType');
                    
                    $avancement = 'non corrigé';
                    $generation = 'non aléatoire';
                    
                    $questionnaire = Questionnaire::create($titre, $description, $date_ouv, $date_ferm, $mode_acces, $avancement, $questId, $mail, $nb_qu, $retour_arriere, $tag, $generation, $type);
                
                    if (!isset($questionnaire)) {
                        $view = new View($this, 'creerQuestionnaire');
                        $view->setArg('questErrorText', 'La création ne peut pas être complétée');
                        $view->render();
                    } else {
                        $id = $questionnaire->id();
                        $newRequest = new Request();
                        $newRequest->write('controller', 'questionnaire');
                        $newRequest->write('action', 'afficherInfoQuestionnaire');
                        $newRequest->writePOST('questionnaire', $id);
                        $this->CreationQuestionnaireEtLancementSession($questionnaire, 'CreationQuestionnaire');
                        //$newRequest->write('user', $login);
                        //Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
                        $controller = Dispatcher::dispatch($newRequest);
                        $controller->execute();
                    }
                }
            }
        }

        public function afficherInfoQuestionnaire($request) {
			$view = new View($this, 'infoQuestionnaire', array('questionnaire' => $this->questionnaire));
            $view->render();
        }
        
        public function listeQuestionnaires($request) {
            $view = new View($this, 'listeQuestionnaires', array('questionnaire' => $this->questionnaire));
            $view->render();
        }

        public function CreationQuestionnaireEtLancementSession($questionnaire, $string) {
            $_SESSION['questTitre'] = $questionnaire->titre();
            $_SESSION['questDescription'] = $questionnaire->description();
            $_SESSION['questDateouv'] = $questionnaire->date_ouv();
            $_SESSION['questDateferm'] = $questionnaire->date_ferm();
            $_SESSION['questModeacces'] = $questionnaire->mode_acces();
            $_SESSION['questAvancement'] = $questionnaire->avancement();
            $_SESSION['questId'] = $questionnaire->id();
            $_SESSION['questMail'] = $questionnaire->mail();
            $_SESSION['questNbquest'] = $questionnaire->nb_qu();
            $_SESSION['questRetourarriere'] = $questionnaire->retour_arriere();
            $_SESSION['questTag'] = $questionnaire->tag();
            $_SESSION['questGeneration'] = $questionnaire->generation();
            $_SESSION['questType'] = $questionnaire->type();
        }
    }    
?>