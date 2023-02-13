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
        // vérifier que les champs sont déclares et pas vide
        // login
        if(isset($_POST["login"]) && !empty($_POST["login"])) {
            $login = $model->test_input($_POST["login"]);
            //vérifier que le login n'est pas utliliser déja
            if($model->user_exist_by_login($login)) {
                $loginErr = "Login déja utiliser !";
            }
        } else {
            $loginErr = "Login required !";
        }
        // password
        if(isset($_POST["password"]) && !empty($_POST["password"])) {
            global $password;
            $password = $model->test_input($_POST["password"]);
            //password validation
            if(!$model->validate_password($password)) {
                $passwordErr = "Confirmer que le mote de passe contient :<br> au moins 1 
                caractère en majuscule, en minuscule, un muméro, caractère 
                spéciaux, 8 caractère au min, 255 ou max !";
            }
        } else {
            $passwordErr = "password required !";
        }

        // confirm password
        if(isset($_POST["cPassword"]) && !empty($_POST["cPassword"])) {
            $cPassword = $model->test_input($_POST["cPassword"]);
            //vérifier que le confirm password === password
            if(!($cPassword === $password)) {
                $cPasswordErr = "confirm password not equal password !";
            }

        } else {
            $cPasswordErr = "confirm password required !";
        }

        // si il n'a pas d'erreurs on crée l'utilisateur
        if(empty($loginErr) && empty($passwordErr) && empty($cPasswordErr)) {
            // create user
            $model->create_user($login, $password);

            // pour afficher un alert que vous êtez bien inscrit
            $_SESSION["user_create"] = $login;
            header("location: ".$pathLien."connexion.php");
            exit();
        } else {
            //Créer des session variable pour l'envoyer au inscription.php pour afficher les erreurs s'il exists
            $_SESSION["loginErr"] = $loginErr;
            $_SESSION["passwordErr"] = $passwordErr;
            $_SESSION["cPasswordErr"] = $cPasswordErr;
            header("location: ".$pathLien."inscription.php");
            exit();
        }
    }
?>

