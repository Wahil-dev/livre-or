<?php

use livreOr\Model;
    require_once("./config.php");
    require_once($pathInclude."inc/model.php");
    $model = new Model();
    
    if(isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 

    $login = $password = "";
    $loginErr = $passwordErr = $identifierErr = "";

    //click connexion
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //login field déclarer et n'est pas vide
        if(isset($_POST["login"]) && !empty($_POST["login"])) {
            $login = $model->test_input($_POST["login"]);
        } else {
            $loginErr = "Login required !";
        }

        //password field déclarer et n'est pas vide
        if(isset($_POST["password"]) && !empty($_POST["password"])) {
            $password = $model->test_input($_POST["password"]);
            //vérifier si le mote de passe n'est pas valide
            if(!$model->is_valid($password)) {
                $passwordErr = "Confirmer que le mote de passe contient :<br> au moins 1 
                caractère en majuscule, en minuscule, un muméro, caractère 
                spéciaux, 8 caractère au min, 255 ou max !";
            }
        } else {
            $passwordErr = "password required !";
        }

        if(empty($loginErr) && empty($passwordErr)) {
            //Vérifier si l'utilisateur est déja inscrit ou non
            if($model->is_registered($login, $password)) {
                $_SESSION["login"] = $model->get_user($login, $password);
                header("location: ".$pathLien."index.php");
                exit();
            } else {
                $identifierErr = "votre identifiant n'est pas valide !";
                $_SESSION["identifierErr"] = $identifierErr;
                header("location: ".$pathLien."connexion.php");
                exit();
            }
        } else {
            $_SESSION["loginErr"] = $loginErr;
            $_SESSION["passwordErr"] = $passwordErr;
            header("location: ".$pathLien."connexion.php");
            exit();
        }
    }
?> 