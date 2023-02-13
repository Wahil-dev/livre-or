<?php
    require_once("./config.php");
    require_once($pathInclude."inc/model.php");
    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."index.php");
        exit();
    } 
?>