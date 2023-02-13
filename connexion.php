<?php
    require_once("inc/config.php");
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo $pathLien?>inc/back_conn.php" method='post' class="form">
            <label for="login">login</label>
            <input type="text" name="login" id="login" class="inp" minlength="3" maxlength="25" required>

            <label for="password">password</label>
            <input type="password" name="password" id="password" class="inp" minlength="8" maxlength="25" required>

            <input type="submit" value="connexion">
        </form>
        <p> vous n'ètez pas inscrit !  inscrit-vous 
            <a href="<?php echo $pathLien?>inscription.php">inscription</a>
        </p>
    </div>
</body>
</html>