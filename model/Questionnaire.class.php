<?php
    class Questionnaire extends Model {
        
        protected static $table_name = 'QUESTIONNAIRE';

        public static function addSQLQuery($key, $sql){
            self::$queries[$key] = $sql;
        }

        public static function create($titre, $description, $date_ouv, $date_ferm, $mode_acces, $avancement, $id, $mail, $nb_qu, $retour_arriere, $tag, $generation, $type) {
            
            $sql = "INSERT INTO QUESTIONNAIRE (TITRE, DESCRIPTION, DATE_D_OUVERTURE, DATE_DE_FERMETURE, MODE_D_ACCES, AVANCEMENT, ID_QUESTIONNAIRE, ADRESSE_MAIL, NB_QUESTIONS, POSSIBILITE_DE_REVENIR_EN_ARRIERE, TAG_IMPOSE, GENERATION_DES_QUESTIONS, TYPE) 
                    VALUES ('".$titre."', '".$description."','".$date_ouv."', '".$date_ferm."', '".$mode_acces."', '".$avancement."', '".$id."', '".$mail."', '".$nb_qu."', '".$retour_arriere."', '".$tag."', '".$generation."', '".$type."') ";
            $sth = self::exec($sql);
            return self::tryId($id);
        }

        // public static function getMail() {
        //     $sql = "SELECT ADRESSE_MAIL FROM QUESTIONNAIRE WHERE ADRESSE_MAIL = '".$questId."'";
        //     $sth = self::exec($sql);
        //     $sth->setFetchMode(PDO::FETCH_ASSOC);
        //     $thisMail = $sth->fetch();
        //     return $thisMail['ADRESSE_MAIL'];
        // }

        public static function isIdUsed($id) {
            $sql = "SELECT COUNT(*) FROM QUESTIONNAIRE WHERE ID_QUESTIONNAIRE = '".$id."' ";
            foreach (Questionnaire::exec($sql)->fetch(PDO::FETCH_ASSOC) as $row) {
                return ($row != '0');
            }
        }
		
		public static function tryId($id) {
            $sql = "SELECT * FROM QUESTIONNAIRE WHERE ID_QUESTIONNAIRE = '".$id."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'questionnaire');
            $allQuestionnaire = $sth->fetchAll();
            return $allQuestionnaire[0];
        }

        public static function getWithId($questId) {
            $sql = "SELECT * FROM QUESTIONNAIRE WHERE ID_QUESTIONNAIRE = '".$questId."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'questionnaire');
            $questionnaire = $sth->fetch();
            return $questionnaire;
        }

        public static function getWithMail($createurMail) {
            $sql = "SELECT * FROM QUESTIONNAIRE WHERE ADRESSE_MAIL = '".$createurMail."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'questionnaires');
            $questionnaires = $sth->fetchAll();
            return $questionnaires;
        }
		
		public function titre() {
            return $this->TITRE;
        }

        public function description() {
            return $this->DESCRIPTION;
        }

        public function date_ouv() {
            return $this->DATE_D_OUVERTURE;
        }

        public function date_ferm() {
            return $this->DATE_DE_FERMETURE;
        }

        public function mode_acces() {
            return $this->MODE_D_ACCES;
        }

        public function avancement() {
            return $this->AVANCEMENT;
        }

        public function id() {
            return $this->ID_QUESTIONNAIRE;
        }

        public function mail() {
            return $this->ADRESSE_MAIL;
        }

        public function nb_qu() {
            return $this->NB_QUESTIONS;
        }

        public function retour_arriere() {
            return $this->POSSIBILITE_DE_REVENIR_EN_ARRIERE;
        }

        public function tag() {
            return $this->TAG_IMPOSE;
        }

        public function generation() {
            return $this->GENERATION_DES_QUESTIONS;
        }

        public function type() {
            return $this->TYPE;
        }
		
		/*public static function getQuestionnaires($login) {
			$sql = "SELECT (ID_QUESTIONNAIRE) FROM QUESTIONNAIRE WHERE ADRESSE_MAIL = '".$login."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $allQuestionnaires = $sth->fetch();
            return $allQuestionnaires;
		}*/
		
	}
?>