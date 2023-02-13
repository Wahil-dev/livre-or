<?php

use livreOr\Model;
    require_once("./config.php");
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."index.php");
        exit();
    } 

    $login = $password = $cPassword = "";
    $loginErr = $passwordErr = $cPasswordErr = "";


    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // vérifier que le login field est déclares et pas vide
        if(isset($_POST["login"]) && !empty($_POST["login"])) {
            $login = $_POST["login"];
        } else {
            $loginErr = "Login required !";
        }

        // vérifier que le password field est déclares et pas vide
        if(isset($_POST["password"]) && !empty($_POST["password"])) {
            $login = $_POST["password"];
        } else {
            $passwordErr = "password required !";
        }

        // vérifier que le cPassword field est déclares et pas vide
        if(isset($_POST["cPassword"]) && !empty($_POST["cPassword"])) {
            $login = $_POST["cPassword"];
        } else {
            $cPasswordErr = "cPassword required !";
        }

        //Créer des session variable pour l'envoyer au inscription.php pour afficher les erreurs s'il exists
        $_SESSION["loginErr"] = $loginErr;
        $_SESSION["passwordErr"] = $passwordErr;
        $_SESSION["cPasswordErr"] = $cPasswordErr;
        header("location: ".$pathLien."inscription.php");
        exit();
    }

?>

