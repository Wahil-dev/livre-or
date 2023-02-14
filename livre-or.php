<?php
use livreOr\Model;
    require_once("inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."livre-or.php");
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
                    <li class="box-lien"><a href="<?php echo $pathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>connexion.php">connexion</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inscription.php">inscription</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>livre-or.php">livre-or</a></li>
                </ul>
            </nav>
        </header>
        <main class="content-page">
            <section class="content">
                <h1>commentaire page</h1>
                <table border="2">
                    <thead>
                        <tr>
                            <th>posté le</th>
                            <th>par utilisateur</th>
                            <th>commentaires</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($model->get_all_comments() as $comment) :?>
                            <tr>
                                <td><?= $comment->date?></td>
                                <td><?= $comment->currentLogin?></td>
                                <td><?= $comment->commentaire?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>