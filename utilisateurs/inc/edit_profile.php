<?php
use livreOr\Model;
    require_once("../../inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 

    $nLogin = $nPassword = "";
    $nLoginErr = $nPasswordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["nLogin"]) && !empty($_POST["nLogin"])) {
            $nLogin = $_POST["nLogin"];
        } else {
            $nLoginErr = "login required !";
        }
        
        if(isset($_POST["nPassword"]) && !empty($_POST["nPassword"])) {
            $nPassword = $_POST["nPassword"];
            //Validation password
            if(!$model->is_valid($nPassword)) {
                $nPasswordErr = "Confirmer que le mote de passe contient :<br> au moins 1 
                caractère en majuscule, en minuscule, un muméro, caractère 
                spéciaux, 8 caractère au min, 255 ou max !";
            }
        } else {
            $nPasswordErr = "password required !";
        }

        if(empty($nLoginErr) && empty($nPasswordErr)) {
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
            header("location: ".$userPathLien."profile.php");
            exit();
        }
    }
?>