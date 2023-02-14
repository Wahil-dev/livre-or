<?php 
    require_once("inc/config.php");
    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."index.php");
        exit();
    }
?>