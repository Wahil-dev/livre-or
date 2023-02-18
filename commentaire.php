<?php
use livreOr\Model;
    require_once("./inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();

    //S'il est connecter
    check_logged_in();
?>

<!DOCTYPE html>
<html lang="fr-FR">
        <?php require_once($pathInclude."inc/header.php") ?>

        <main class="content-page">
            <section class="content flex-c">
                <h1>commentaire page</h1>
                <form action="<?php echo $pathLien?>inc/back_comments.php" method="post" class="form flex-c">
                    <label for="comment">commentaire</label>
                    <textarea name="comment" id="comment" class="inp"></textarea>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["commentErr"]) ? $_SESSION["commentErr"] : ""?></span>

                    <input type="submit" value="post" class="btn-custom">
                </form>
            </section>
        </main>
    </div>
</body>
</html>
<?php
    unset($_SESSION["commentErr"]);
