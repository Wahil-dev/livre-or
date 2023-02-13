<?php

use livreOr\Model;
    require_once("./config.php");
    require_once($pathInclude."inc/model.php");
    $model = new Model();
    
    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."index.php");
        exit();
    } 

?> 