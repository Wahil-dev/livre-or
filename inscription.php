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
    <title>inscription</title>
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/style.css">
</head>
<body>
    <div class="container">
        <a href="<?php echo $pathLien?>index.php">acceuil</a>
        <form action="<?php echo $pathLien?>inc/back_insc.php" method='post' class="form">
            <label for="login">login</label>
            <input type="text" name="login" id="login" class="inp" minlength="3" maxlength="25" value="<?php echo isset($_POST['login']) ? ($_POST['login']) : ""?>" required>
            <span class="error"><?php echo isset($_SESSION["loginErr"]) ? $_SESSION["loginErr"] : ""?></span>

            <label for="password">password</label>
            <input type="password" name="password" id="password" class="inp" minlength="1" maxlength="25" required>
            <span class="error"><?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ""?></span>

            <label for="cPassword">confirm password</label>
            <input type="password" name="cPassword" id="cPassword" class="inp" minlength="1" maxlength="25" required>
            <span class="error"><?php echo isset($_SESSION["cPasswordErr"]) ? $_SESSION["cPasswordErr"] : ""?></span>

            <input type="submit" value="inscription">
        </form>
        <p> vous ètez déja inscrit ! Connectez-vous 
            <a href="<?php echo $pathLien?>connexion.php">connexion</a>
        </p>
    </div>
</body>
</html>
<!--  supprimer les variables session pour les erreurs  -->
<?php 
    unset($_SESSION["loginErr"]);
    unset($_SESSION["passwordErr"]);
    unset($_SESSION["cPasswordErr"]);
?>