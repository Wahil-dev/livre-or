<?php
    require_once("./inc/config.php"); 
    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="fr-FR">
        <?php require_once($pathInclude."inc/header.php") ?>

        <main class="content-page">
            <section class="">
                <h1>update profile page</h1>
                <!-- error message -->
                <span class="error"><?php echo isset($_SESSION["identifierErr"]) ? $_SESSION["identifierErr"] : ""?></span>

                <form action="<?php echo $pathLien?>inc/edit_profile.php" method='post' class="form">
                    <label for="nLogin">nouveau login</label>
                    <input type="text" name="nLogin" id="nLogin" class="inp" minlength="3" maxlength="25" required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["nLoginErr"]) ? $_SESSION["nLoginErr"] : ""?></span>

                    <label for="oldPassword">ancien password</label>
                    <input type="password" name="oldPassword" id="oldPassword" class="inp" minlength="8" maxlength="25" required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["oldPasswordErr"]) ? $_SESSION["oldPasswordErr"] : ""?></span>

                    <label for="nPassword">nouveau password</label>
                    <input type="password" name="nPassword" id="nPassword" class="inp" minlength="8" maxlength="25" required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["nPasswordErr"]) ? $_SESSION["nPasswordErr"] : ""?></span>

                    <label for="confirmNvPassword">confirmation nouveau password</label>
                    <input type="password" name="confirmNvPassword" id="confirmNvPassword" class="inp" minlength="8" maxlength="25" required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["confirmNvPasswordErr"]) ? $_SESSION["confirmNvPasswordErr"] : ""?></span>

                    <input type="submit" value="save change">
                </form>
            </section>
        </main>
    </div>
</body>
</html>
<!--  supprimer les variables session pour les erreurs  -->
<?php 

    if(isset($_SESSION["nLoginErr"], $_SESSION["nPasswordErr"], $_SESSION["confirmNvPasswordErr"], $_SESSION["oldPasswordErr"])) {
        unset($_SESSION["nLoginErr"]);
        unset($_SESSION["nPasswordErr"]);
        unset($_SESSION["confirmNvPasswordErr"]);
        unset($_SESSION["oldPasswordErr"]);
    }
?>