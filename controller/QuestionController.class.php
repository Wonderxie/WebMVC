<?php
    class QuestionController extends Controller {
        protected $question;
        
        public function __construct($request) {
            parent::__construct($request);
            if (!isset($_SESSION)) {
                session_start();
            }
            $questionId = NULL;
            if(($request->has('question'))) {
                $questionId = $request->read('question');
            }     
            if (!is_null($questionId)) {
                $this->question = Question::getWithId($questionId);
            }
        }

        public function defaultAction($request) {
            $view = new View($this, 'infoQuestion', array('question' => $this->question));
            $view->render();
        }

        public function creationQuestion($request) {
            $view = new View($this, 'creerQuestion');
            $view->render();
        }

        public function validateCreation($request) {
            if (!empty($_POST['questionType']) && !empty($_POST['questionnaireId']) && !empty($_POST['questionTag']) && !empty($_POST['questionContenu']) && !empty($_POST['questionBaremebon']) && !empty($_POST['questionBaremefaux']) && !empty($_POST['tempMax'])) {
                $type = $request->read('questionType');
                $questionnaireId = $request->read('questionnaireId');
                $questionId = $request->read('');
                if (Question::isIdUsed($questionId)) {
                    $view = new View($this, 'creerQuestion');
                    $view->setArg('questErrorText', 'Cet identifiant de question est déjà utilisé');
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
                    
                    $question = Question::create($titre, $description, $date_ouv, $date_ferm, $mode_acces, $avancement, $questId, $mail, $nb_qu, $retour_arriere, $tag, $generation, $type);
                
                    if (!isset($question)) {
                        $view = new View($this, 'creerQuestion');
                        $view->setArg('questErrorText', 'La création ne peut pas être complétée');
                        $view->render();
                    } else {
                        $id = $question->id();
                        $newRequest = new Request();
                        $newRequest->write('controller', 'question');
                        $newRequest->write('action', 'afficherInfoQuestion');
                        $newRequest->writePOST('question', $id);
                        $this->CreationQuestionEtLancementSession($question, 'CreationQuestion');
                        //$newRequest->write('user', $login);
                        //Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
                        $controller = Dispatcher::dispatch($newRequest);
                        $controller->execute();
                    }
                }
            }
        }

        public function afficherInfoQuestion($request) {
			$view = new View($this, 'infoQuestion', array('question' => $this->question));
            $view->render();
		}

        public function CreationQuestionEtLancementSession($question, $string) {
            $_SESSION['questTitre'] = $question->titre();
            $_SESSION['questDescription'] = $question->description();
            $_SESSION['questDateouv'] = $question->date_ouv();
            $_SESSION['questDateferm'] = $question->date_ferm();
            $_SESSION['questModeacces'] = $question->mode_acces();
            $_SESSION['questAvancement'] = $question->avancement();
            $_SESSION['questId'] = $question->id();
            $_SESSION['questMail'] = $question->mail();
            $_SESSION['questNbquest'] = $question->nb_qu();
            $_SESSION['questRetourarriere'] = $question->retour_arriere();
            $_SESSION['questTag'] = $question->tag();
            $_SESSION['questGeneration'] = $question->generation();
            $_SESSION['questType'] = $question->type();
        }
    }    
?>