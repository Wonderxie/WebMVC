<?php
    class User extends Model {
        
        protected static $table_name = 'UTILISATEUR';

        // public static function getList() {
        //     return parent::exec('USER_LIST');
        // }

        public static function addSQLQuery($key, $sql){
            self::$queries[$key] = $sql;
        }

        public static function create($nom, $prenom, $mail, $type, $pwd, $matricule, $matiere, $promo, $pseudo) {
            
            $sql = "INSERT INTO UTILISATEUR (NOM, PRENOM, ADRESSE_MAIL, TYPE, MOT_DE_PASSE, MATRICULE, MATIERE, PROMO, ID) 
                    VALUES ('".$nom."', '".$prenom."','".$mail."', '".$type."', '".$pwd."', '".$matricule."', '".$matiere."', '".$promo."', '".$pseudo."') ";
            $sth = self::exec($sql);
            // $sth = parent::exec(
            //     'USER_CREATE',
            //     array(  ':login' => $login,
            //             ':pwd' => $pwd,
            //             ':email' => $mail,
            //             //':role' => 1,
            //             ':name' => $prenom,
            //             ':surname' => $nom)
            // );
            return self::tryLogin($mail, $pwd);
        }

        public static function isLoginUsed($login) {
            $sql = "SELECT COUNT(*) FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$login."' ";
            foreach (User::exec($sql)->fetch(PDO::FETCH_ASSOC) as $row) {
                return ($row != '0');
            }
        }

        public static function tryLogin($login, $password) {
            $sql = "SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$login."' AND MOT_DE_PASSE = '".$password."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0];
        }

        public static function isLoginSuccess($login, $password) {
            $sql = "SELECT (MOT_DE_PASSE) FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$login."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $thisPassword = $sth->fetch();
            //$thisPassword = $sth->fetch(PDO::FETCH_ASSOC);
            if ($thisPassword["MOT_DE_PASSE"] == $password) {
                return true;
            }
            return false;
        }
        
        public static function getWithId($userId) {
            $sql = "SELECT * FROM UTILISATEUR WHERE ID = '".$userId."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $user = $sth->fetch();
            return $user;
        }

        public static function getWithLogin($login) {
            $sql = "SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$login."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $user = $sth->fetch();
            return $user;
        }
		
		
		

        public function login() {
            //return $this->props[self::$table_name.'_USER_LOGIN'];
            // $sql = "SELECT (USER_LOGIN) FROM USER WHERE ";
            // $sth = self::exec($sql);
            // $sth->setFetchMode(PDO::FETCH_ASSOC);
            return $this->ADRESSE_MAIL;
        }

        public function mail() {
            return $this->ADRESSE_MAIL;
        }

        public function promo() {
            return $this->PROMO;
        }

        public function matricule() {
            return $this->MATRICULE;
        }

        public function matiere() {
            return $this->MATIERE;
        }

        public function pseudo() {
            return $this->ID;
        }

        public function prenom() {
            return $this->PRENOM;
        }
        
        public function nom() {
            return $this->NOM;
        }

        public function id() { 
            return $this->ID;
            //return $this->props[self::$table_name.'_USER_ID'];
        }
		
		public function type() {
			return $this->TYPE;
		}

        public function password() {
            return $this->MOT_DE_PASSE;
        }

        public static function modify_nom($nom, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET NOM = '".$nom."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getNom($mail);
        }
		
		public static function getNom($mail) {
            $sql = "SELECT NOM FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }


        public static function modify_prenom($prenom, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET PRENOM = '".$prenom."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getPrenom($mail);
        }
		
		public static function getPrenom($mail) {
            $sql = "SELECT PRENOM FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }

        

        /*public static function modify_promo($promo, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET PROMO = '".$promo."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getPromo($mail);
        }
		
		public static function getPromo($mail) {
            $sql = "SELECT PROMO FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }*/

        public static function modify_matricule($matricule, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET MATRICULE = '".$matricule."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);
            return self::getMatricule($mail);
        }
		
		public static function getMatricule($mail) {
            $sql = "SELECT MATRICULE FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }
		

        /*public static function modify_matiere($matiere, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET MATIERE = '".$matiere."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getMatiere($mail);
        }
		
		public static function getMatiere($mail) {
            $sql = "SELECT MATIERE FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }*/

        public static function modify_password($password, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET MOT_DE_PASSE = '".$password."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getPassword($mail);
        }
		
		public static function getPassword($mail) {
            $sql = "SELECT MOT_DE_PASSE FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }
		
		

        public static function modify_pseudo($pseudo, $mail) {
            
            $sql = "UPDATE UTILISATEUR
                    SET ID = '".$pseudo."' WHERE ADRESSE_MAIL = '".$mail."'";
            $sth = self::exec($sql);

            return self::getPseudo($mail);
        }
		
		public static function getPseudo($mail) {
            $sql = "SELECT ID FROM UTILISATEUR WHERE ADRESSE_MAIL = '".$mail."'";
			$sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0]; 
        }

        
        //public function roleId() { return $this->props[self::$table_name.'_ROLE']; }
        //public function role() { return Role::getWithId($this->roleId()); }
        //public function isAdmin() { return ($this->role()->isAdmin()) || ($this->role()->isSuperAdmin()); }
        //public function isSuperAdmin() { return $this->role()->isSuperAdmin();
    }
?>