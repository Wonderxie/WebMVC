<?php
    class Question extends Model {
        
        protected static $table_name = 'QUESTION';

        public static function addSQLQuery($key, $sql){
            self::$queries[$key] = $sql;
        }
		
		public static function create($type, $tag, $contenu) {
            $sql = "INSERT INTO QUESTION (TYPE_QUESTION, TAG_QUESTION, CONTENU_DE_LA_QUESTION) 
                    VALUES ('".$type."', '".$tag."','".$contenu."') ";
			$sth = self::exec($sql);
			//$numQuestion = self::numDerniereQuestion();
            //return self::tryNum($numQuestion);
        }

        public static function isIdUsed($id) {
            $sql = "SELECT COUNT(*) FROM QUESTION WHERE NUMERO_QUESTION = '".$id."' ";
            foreach (Questionnaire::exec($sql)->fetch(PDO::FETCH_ASSOC) as $row) {
                return ($row != '0');
            }
        }
		
		/*public static function tryNum($numQuestion) {
            $sql = "SELECT * FROM QUESTION WHERE NUMERO_QUESTION = '".$numQuestion."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'question');
            $allQuestionnaire = $sth->fetchAll();
            return $allQuestionnaire[0];
        }*/
		
		public static function numDerniereQuestion() {
            $sql = "SELECT MAX(NUMERO_QUESTION) FROM QUESTION";
			$sth = self::exec($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS, 'question');
            $question = $sth->fetchAll();
            return $question[0];
        }
		
		/*public function numQuestion() {
			return $this->NUMERO_QUESTION;
		}*/
		
	}
?>
