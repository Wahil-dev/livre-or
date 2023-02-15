<?php
    if(!session_id()) session_start();
    
    $pathLien = "/laplateforme/livre-or/";
    $pathInclude = $_SERVER["DOCUMENT_ROOT"]."/laplateforme/livre-or/";

    //Verifier s'il est connecter
    function check_logged_in() {
        global $pathLien;
        if(!isset($_SESSION["login"])) {
            header("location: ".$pathLien."index.php");
            exit();
        }

        return true;
    }

    function check_not_logged_in() {
        global $pathLien;
        if(isset($_SESSION["login"])) {
            header("location: ".$pathLien."index.php");
            exit();
        }

        return true;
    }
?>