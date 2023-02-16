<?php
    require_once("config.php"); 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="wahil chettouf">
    <title>Acceuil</title>
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/MQuiry.css">
</head>
<body>
    <header id="header">
        <nav class="navigation">
            <?php if(isset($_SESSION["login"])) :?>
                <ul class="menu flex-r">
                    <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>commentaire.php">commentaire</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>profile.php">profile</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inc/logout.php">logout</a></li>
                </ul>
            <?php else :?>
                <ul class="menu flex-r">
                    <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>connexion.php">connexion</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inscription.php">inscription</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
                </ul>
            <?php endif?>
        </nav>
    </header>
    <div class="container">