<?php 
    require_once("../inc/config.php");
    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    }
?>