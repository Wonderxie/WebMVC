<?php
    class AppartientA extends Model {
        
        protected static $table_name = 'APPARTIENT_A';

        public static function addSQLQuery($key, $sql){
            self::$queries[$key] = $sql;
        }
		
		public static function create($idQuestionnaire, $numQuestion, $baremeBon, $baremeFaux, $tempsMax) {
            $sql = "INSERT INTO APPARTIENT_A (ID_QUESTIONNAIRE, NUMERO_QUESTION, BAREME_JUSTE_LOCAL, BAREME_FAUX_LOCAL, TEMPS_MAX_QUESTION) 
                    VALUES ('".$idQuestionnaire."', '".$numQuestion."','".$baremeBon."','".$baremeFaux."','".$tempsMax."') ";
            $sth = self::exec($sql);
            return self::tryNum($numQuestion);
        }
		
		public static function tryNum($numQuestion) {
            $sql = "SELECT * FROM APPARTIENT_A WHERE NUMERO_QUESTION = '".$numQuestion."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'appartient_a');
            $allQuestionnaire = $sth->fetchAll();
            return $allQuestionnaire[0];
        }
		
		
	}
?>