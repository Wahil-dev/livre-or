<?php
    require_once("./config.php");
    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    }
    require_once("config.php");
    session_unset();
    session_destroy();
    header("location: ".$pathLien."index.php");
    exit();