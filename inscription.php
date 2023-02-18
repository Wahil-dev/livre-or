<?php
    require_once("inc/config.php");
    
    //S'il est connecter
    check_not_logged_in();
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <?php require_once($pathInclude."inc/header.php") ?>

            <div class="content-page">
                <form action="<?php echo $pathLien?>inc/back_insc.php" method='post' class="form flex-c">
                    <label for="login">login</label>
                    <input type="text" name="login" id="login" class="inp" minlength="3" maxlength="25" value="<?php echo isset($_POST['login']) ? ($_POST['login']) : ""?>" required>
                    <span class="error"><?php echo isset($_SESSION["loginErr"]) ? $_SESSION["loginErr"] : ""?></span>

                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="inp" minlength="1" maxlength="25" required>
                    <span class="error"><?php echo isset($_SESSION["passwordErr"]) ? $_SESSION["passwordErr"] : ""?></span>

                    <label for="cPassword">confirm password</label>
                    <input type="password" name="cPassword" id="cPassword" class="inp" minlength="1" maxlength="25" required>
                    <span class="error"><?php echo isset($_SESSION["cPasswordErr"]) ? $_SESSION["cPasswordErr"] : ""?></span>

                    <input type="submit" value="inscription" class="btn-custom">
                </form>
                <p class="box-lien"> vous ètez déja inscrit ! Connectez-vous 
                    <a href="<?php echo $pathLien?>connexion.php">connexion</a>
                </p>
            </div>
        </div>
</body>
</html>
<!--  supprimer les variables session pour les erreurs  -->
<?php 
    unset($_SESSION["loginErr"]);
    unset($_SESSION["passwordErr"]);
    unset($_SESSION["cPasswordErr"]);
?>