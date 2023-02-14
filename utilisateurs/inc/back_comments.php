<?php
use livreOr\Model;
    require_once("../../inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 

    $comment = "";
    $commentErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["comment"]) && !empty($_POST["comment"])) {
            $comment = $model->test_input($_POST["comment"]);
        } else {
            $commentErr = "commentaire required !";
        }

        // Vérifier que il n'a pas d'érreur
        if(empty($commentErr)) {
            $model->set_comment($comment, $_SESSION["login"]->id);
    
            //Redirect to commentaire page
            header("location: ".$userPathLien."livre-or.php");
            exit();
        } else {
            $_SESSION["commentErr"] = $commentErr;
            //Redirect to commentaire page
            header("location: ".$userPathLien."commentaire.php");
            exit();
        }
    }

