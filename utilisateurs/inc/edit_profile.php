<?php
use livreOr\Model;
    require_once("../../inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 

    $nLogin = $nPassword = $confirmNvPassword = "";
    $nLoginErr = $nPasswordErr = $confirmNvPasswordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //login
        if(isset($_POST["nLogin"]) && !empty($_POST["nLogin"])) {
            $nLogin = $model->test_input($_POST["nLogin"]);
        } else {
            $nLoginErr = "login required !";
        }
        
        //Password
        if(isset($_POST["nPassword"]) && !empty($_POST["nPassword"])) {
            $nPassword = $model->test_input($_POST["nPassword"]);
            //Validation password
            if(!$model->is_valid($nPassword)) {
                $nPasswordErr = "Confirmer que le mote de passe contient :<br> au moins 1 
                caractère en majuscule, en minuscule, un muméro, caractère 
                spéciaux, 8 caractère au min, 255 ou max !";
            }
        } else {
            $nPasswordErr = "password required !";
        }

        //Confirm password
        if(isset($_POST["confirmNvPassword"]) && !empty($_POST["confirmNvPassword"])) {
            $confirmNvPassword = $model->test_input($_POST["confirmNvPassword"]);
            //vérifier que le confirm password === password
            if(!($confirmNvPassword === $nPassword)) {
                $confirmNvPasswordErr = "confirm nouveau password not equal nouveau password !";
            }
    
        } else {
            $cPasswordErr = "confirm nouveau password required !";
        }

        if(empty($nLoginErr) && empty($nPasswordErr) && empty($confirmNvPasswordErr)) {
            //Vérifier si l'utilisateur encore connecter
            if(isset($_SESSION["login"])) {
                $userId = $_SESSION["login"]->id;
                $model->update_profile($nLogin, $nPassword, $userId);

                //Update login session
                $_SESSION["login"] = $model->get_user($nLogin, $nPassword);
                header("location: ".$userPathLien."profile.php");
                exit();
            } else {
                header("location: ".$pathLien."connexion.php");
                exit();
            }
        } else {
            $_SESSION["nLoginErr"] = $nLoginErr;
            $_SESSION["nPasswordErr"] = $nPasswordErr;
            $_SESSION["confirmNvPasswordErr"] = $confirmNvPasswordErr;
            header("location: ".$userPathLien."profile.php");
            exit();
        }
    }
?>