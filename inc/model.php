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
        
        /* ------------------ Getters For utilisateurs ------------------- */

        public function get_users_table_name() {
            $tbname = "utilisateurs";
            return $tbname;
        }

        public function get_user($login, $password) {
            $request = $this->dbConn->prepare("SELECT * FROM ".$this->get_users_table_name()." WHERE login=? && password=?");
            $request->bindParam(1, $login);
            $request->bindParam(2, $password);
            $request->execute();
            return $request->fetchObject();
        }
        

        /* ------------------ Setters For utilisateurs ------------------- */
        // create user methode
        public function create_user($login, $password) {
            $request = $this->dbConn->prepare("INSERT INTO " .$this->get_users_table_name().
            "(login, password) VALUES(?, ?)");
            $request->bindParam(1, $login);
            $request->bindParam(2, $password);
            $request->execute();
        } 

        public function update_profile($nLogin, $nPassword, $userId) {
            $request = $this->dbConn->prepare("UPDATE ".$this->get_users_table_name()." SET login = ?, password = ? WHERE id=?");
            $request->bindParam(1, $nLogin);
            $request->bindParam(2, $nPassword);
            $request->bindParam(3, $userId);
            $request->execute();
        }


        /* -------------- Others methods For utilisateur --------------- */

        // validate_password
        public function is_valid($password) {
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
        
        public function user_exist_by_login($login) {
            $request = $this->dbConn->prepare("SELECT login FROM ".$this->get_users_table_name()." WHERE login=?");
            $request->bindParam(1, $login);
            $request->execute();
            return !empty($request->fetchObject());
        }

        public function is_registered($login, $password) {
            $request = $this->dbConn->prepare("SELECT * FROM ".$this->get_users_table_name()." WHERE login = ? && password = ?");
            $request->bindParam(1, $login);
            $request->bindParam(2, $password);
            $request->execute();
            return !empty($request->fetch());
        }





        /* -------------- Getters For commentaires --------------- */
        public function get_comments_table_name() {
            $tbname = "commentaires";
            return $tbname;
        }

        public function get_all_comments() {
            $request = $this->dbConn->prepare("SELECT "
            .$this->get_comments_table_name().".commentaire, "
            .$this->get_comments_table_name().".id_utilisateur, "
            .$this->get_comments_table_name().".date, "
            .$this->get_users_table_name().".login as currentLogin".
            " FROM ".$this->get_comments_table_name()." INNER JOIN ".$this->get_users_table_name()." ON ".$this->get_comments_table_name()
            .".id_utilisateur = ".$this->get_users_table_name().".id
            ORDER BY ".$this->get_comments_table_name()
            .".date DESC");
            $request->execute();
            
            return $request->fetchAll(PDO::FETCH_OBJ);
        }



        /* --------------- Setters For commentaires -------------- */
        public function set_comment($text, $userId) {
            $request = $this->dbConn->prepare("INSERT INTO ".$this->get_comments_table_name()."(commentaire, id_utilisateur ) VALUES(?, ?)");
            $request->bindParam(1, $text);
            $request->bindParam(2, $userId);
            $request->execute();
        }


        /* --------- Others methods For commentaires ----------- */
    }
?>