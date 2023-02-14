<?php
    require_once("inc/config.php");
    if(isset($_SESSION["login"])) {
        header("location: ".$userPathLien."index.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/style.css">
</head>
<body>
    <div class="container">
        <a href="<?php echo $pathLien?>index.php">acceuil</a>
        <!-- error message -->
        <span class="error"><?php echo isset($_SESSION["identifierErr"]) ? $_SESSION["identifierErr"] : ""?></span>

        <form action="<?php echo $pathLien?>inc/back_conn.php" method='post' class="form">
            <label for="login">login</label>
            <input type="text" name="login" id="login" class="inp" minlength="3" maxlength="25" required>
            <!-- error message -->
            <span class="error"><?php echo isset($_SESSION["loginErr"]) ? $_SESSION["loginErr"] : ""?></span>

            <label for="password">password</label>
            <input type="password" name="password" id="password" class="inp" minlength="8" maxlength="25" required>
            <!-- error message -->
            <span class="error"><?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ""?></span>

            <input type="submit" value="connexion">
        </form>
        <p> vous n'ètez pas inscrit !  inscrit-vous 
            <a href="<?php echo $pathLien?>inscription.php">inscription</a>
        </p>
    </div>
</body>
</html>
<!--  supprimer les variables session pour les erreurs  -->
<?php 
    if(isset($_SESSION["identifierErr"])) {
        unset($_SESSION["identifierErr"]);
    }
    if(isset($_SESSION["loginErr"], $_SESSION["passwordErr"])) {
        unset($_SESSION["loginErr"]);
        unset($_SESSION["passwordErr"]);
    }
?>