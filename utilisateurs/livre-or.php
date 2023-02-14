<?php
    require_once("../inc/config.php"); 
    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 
?>

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
                    <li class="box-lien"><a href="<?php echo $userPathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $userPathLien?>livre-or.php">livre-or</a></li>
                    <li class="box-lien"><a href="<?php echo $userPathLien?>commentaire.php">commentaire</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inc/logout.php">logout</a></li>
                </ul>
            </nav>
        </header>
        <main class="content-page">
            <section class="content">
                <h1>commentaire page</h1>
                <table border="2">
                    <thead>
                        <tr>
                            <th>posté par</th>
                            <th>par utilisateur</th>
                            <th>commentaires</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>