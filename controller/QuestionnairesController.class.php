<?php
    class QuestionnairesController extends Controller {
        protected $questionnaires;
        
        public function __construct($request) {
            parent::__construct($request);
            if (!isset($_SESSION)) {
                session_start();
            }
            $createurMail = NULL;
            if(($request->has('questionnaires'))) {
                $createurMail = $request->read('questionnaires');
            }     
            if (!is_null($createurMail)) {
                $this->questionnaires = Questionnaires::getWithMail($createurMail);
            }
        }

        public function defaultAction($request) {
            $view = new View($this, 'listeQuestionnaires', array('questionnaires' => $this->questionnaires));
            $view->render();
        }

        public static function getWithMail($createurMail) {
            $sql = "SELECT * FROM QUESTIONNAIRE WHERE ADRESSE_MAIL = '".$createurMail."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'questionnaires');
            $questionnaires = $sth->fetchAll();
            return $questionnaires;
        }

        public function showQuestionnairesEtLancementSession($questionnaires, $string) {
            foreach (Questionnaires::getWithMail() as $_SESSION) {
                ;
            }
        }

        public function listeQuestionnaires($request) {
            $questionnaires = Questionnaire::getWithMail($_SESSION['userMail']);
            $view = new View($this, 'listeQuestionnaires', array('questionnaires' => $this->questionnaires));
            $view->render();
        }
    }
?>