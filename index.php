<?php require_once("inc/config.php"); ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="wahil chettouf">
    <title>Acceuil</title>
</head>
<body>
    <div class="container">
        <header id="header">
            <nav>
                <ul class="menu">
                    <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>connexion.php">connexion</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inscription.php">inscription</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
                </ul>
            </nav>
        </header>
        <main class="content-page">
            <section class="">
                <h1>Index Page</h1>
            </section>
        </main>
    </div>
</body>
</html>