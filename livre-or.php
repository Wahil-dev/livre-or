<?php
use livreOr\Model;
    require_once("inc/config.php"); 
    require_once($pathInclude."inc/model.php");
    $model = new Model();
?>

<!DOCTYPE html>
<html lang="fr-FR">
        <?php require_once($pathInclude."inc/header.php") ?>
        
        <main class="content-page">
            <section class="content flex-c">
                <h1>réservations page</h1>
                <table border="2" class="table">
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