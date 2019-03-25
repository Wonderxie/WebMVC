<?php
    class User extends Model {
        
        protected static $table_name = 'USER';

        // public static function getList() {
        //     return parent::exec('USER_LIST');
        // }

        public static function addSQLQuery($key, $sql){
            self::$queries[$key] = $sql;
        }

        public static function create($login, $pwd, $mail, $prenom, $nom) {
            
            $sql = "INSERT INTO USER (USER_LOGIN, USER_PWD, USER_EMAIL, USER_NAME, USER_SURNAME) 
                    VALUES ('".$login."', '".$pwd."','".$mail."', '".$prenom."', '".$nom."') ";
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
            return self::tryLogin($login, $pwd);
        }

        public static function isLoginUsed($login) {
            $sql = "SELECT COUNT(*) FROM USER WHERE USER_LOGIN = '".$login."' ";
            foreach (User::exec($sql)->fetch(PDO::FETCH_ASSOC) as $row) {
                return ($row != '0');
            }
        }

        public static function tryLogin($login, $password) {
            $sql = "SELECT * FROM USER WHERE USER_LOGIN = '".$login."' AND USER_PWD = '".$password."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $allUser = $sth->fetchAll();
            return $allUser[0];
        }

        public static function isLoginSuccess($login, $password) {
            $sql = "SELECT (USER_PWD) FROM USER WHERE USER_LOGIN = '".$login."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $thisPassword = $sth->fetch();
            //$thisPassword = $sth->fetch(PDO::FETCH_ASSOC);
            if ($thisPassword["USER_PWD"] == $password) {
                return true;
            }
            return false;
        }
        
        public static function getWithId($userId) {
            $sql = "SELECT * FROM USER WHERE USER_ID = '".$userId."'";
            $sth = self::exec($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'user');
            $user = $sth->fetch();
            return $user;
        }

        public static function getWithLogin($login) {
            $sql = "SELECT * FROM USER WHERE USER_LOGIN = '".$login."'";
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
            return $this->USER_LOGIN;
        }

        public function mail() {
            return $this->USER_EMAIL;
        }

        public function prenom() {
            return $this->USER_NAME;
        }
        
        public function nom() {
            return $this->USER_SURNAME;
        }

        public function id() { 
            return $this->USER_ID;
            //return $this->props[self::$table_name.'_USER_ID'];
        }
        //public function roleId() { return $this->props[self::$table_name.'_ROLE']; }
        //public function role() { return Role::getWithId($this->roleId()); }
        //public function isAdmin() { return ($this->role()->isAdmin()) || ($this->role()->isSuperAdmin()); }
        //public function isSuperAdmin() { return $this->role()->isSuperAdmin();
    }
?>