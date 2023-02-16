<?php
    require_once("inc/config.php");
    
    //S'il est connecter
    check_not_logged_in();
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <?php require_once($pathInclude."inc/header.php") ?>
    
        <div class="content-page">
            <!-- error message -->
            <span class="error"><?php echo isset($_SESSION["identifierErr"]) ? $_SESSION["identifierErr"] : ""?></span>
    
            <form action="<?php echo $pathLien?>inc/back_conn.php" method='post' class="form flex-c">
                <label for="login">login</label>
                <input type="text" name="login" id="login" class="inp" minlength="3" maxlength="25" required>
                <!-- error message -->
                <span class="error"><?php echo isset($_SESSION["loginErr"]) ? $_SESSION["loginErr"] : ""?></span>
    
                <label for="password">password</label>
                <input type="password" name="password" id="password" class="inp" minlength="8" maxlength="25" required>
                <!-- error message -->
                <span class="error"><?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ""?></span>
    
                <input type="submit" value="connexion" class="btn-custom">
            </form>
            <p class="box-lien"> vous n'ètez pas inscrit !  inscrit-vous 
                <a href="<?php echo $pathLien?>inscription.php">inscription</a>
            </p>
        </div>
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