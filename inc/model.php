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

        public function isExiste($id) {
            echo "private";
        }


        /* ------------------ Setters ------------------- */
        public function db_update_profile($post) {
            $request = $this->dbConn->prepare("UPDATE INTO utilisateur");
        }

        // supprimer les espaces / transformer les tags html en text / back slash
        public function test_input($inp) {
            $inp = trim($inp);
            $inp = stripslashes($inp);
            $inp = htmlspecialchars($inp);
            return $inp;
        }

    }
?>