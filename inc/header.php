<?php

?>

<header id="header">
    <nav>
        <?php if(isset($_SESSION["login"])) :?>
            <ul class="menu">
            <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
            <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
            <li class="box-lien"><a href="<?php echo $pathLien?>commentaire.php">commentaire</a></li>
            <li class="box-lien"><a href="<?php echo $pathLien?>profile.php">profile</a></li>
            <li class="box-lien"><a href="<?php echo $pathLien?>inc/logout.php">logout</a></li>
            </ul>
        <?php else :?>
            <ul class="menu">
                <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
                <li class="box-lien"><a href="<?php echo $pathLien?>connexion.php">connexion</a></li>
                <li class="box-lien"><a href="<?php echo $pathLien?>inscription.php">inscription</a></li>
                <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
            </ul>
        <?php endif?>
    </nav>
</header>