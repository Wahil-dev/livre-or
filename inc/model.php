<?php
    namespace livreOr;

    use PDO;
    use PDOException;

    if(!session_id()) session_start();
    class Model {
        private $serverName;
        private $dbName;
        private $userName;
        private $password;
        private $dbConn;

        function __construct() {
            $this->serverName = "localhost";
            $this->dbName = "livreor";
            $this->userName = "root";
            try {
                $this->dbConn = new PDO("mysql:host=".$this->serverName."; dbname=".$this->dbName, $this->userName, $this->password);
                $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->dbConn;
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        
        /* ------------------ Getters ------------------- */
        public function get_user_table_name() {
            $tbname = "utilisateurs";
            return $tbname;
        }

        /* ------------------ Setters ------------------- */
        // create user methode
        public function create_user($login, $password) {
            $request = $this->dbConn->prepare("INSERT INTO " .$this->get_user_table_name().
            "(login, password) VALUES(?, ?)");
            $request->bindParam(1, $login);
            $request->bindParam(2, $password);
            $request->execute();
        } 



        /* -------------- Others methods --------------- */

        // validate_password
        public function validate_password($password) {
            $uppercase = preg_match("@[A-Z]@", $password);
            $lowercase = preg_match("@[a-z]@", $password);
            $number = preg_match("@[0-9]@", $password);
            $specialChars = preg_match("@[^\w]@", $password);
            $length = strlen($password) >= 8 && strlen($password) < 255;
            if(!$uppercase || !$lowercase || !$number || !$specialChars || !$length) {
                return false;
            }

            return true;
        }

        // supprimer les espaces / transformer les tags html en text / back slash
        public function test_input($inp) {
            $inp = trim($inp);
            $inp = stripslashes($inp);
            $inp = htmlspecialchars($inp);
            return $inp;
        }
        
        public function user_not_exist_by_login($login) {
            $request = $this->dbConn->prepare("SELECT login FROM ".$this->get_user_table_name()." WHERE login=?");
            $request->bindParam(1, $login);
            $request->execute();
            return empty($request->fetchObject());
        }
    }
?>