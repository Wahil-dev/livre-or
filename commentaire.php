<?php
use livreOr\Model;
    require_once("./inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

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
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php require_once($pathInclude."inc/header.php") ?>

        <main class="content-page">
            <section class="content">
                <h1>commentaire page</h1>
                <form action="<?php echo $pathLien?>inc/back_comments.php" method="post">
                    <label for="comment">commentaire</label>
                    <textarea name="comment" id="comment"></textarea>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["commentErr"]) ? $_SESSION["commentErr"] : ""?></span>

                    <input type="submit" value="post">
                </form>
            </section>
        </main>
    </div>
</body>
</html>
<?php
    unset($_SESSION["commentErr"]);