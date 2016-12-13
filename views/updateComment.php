<div class="bloc-title">
    <div class="container">
        <h1>Mettre à jour son commentaire</h1>
    </div>
</div>

<div class="container">
    <?php
    require_once 'model/comment.php';

    $id_billet = $_GET['id_billet'];
    $idCom = $_GET['id_comment'];
    $data = selectInfoComment($idCom);
    foreach ($data as $key => $value) {
        $idCom = $value['id_comment'];
        $content = $value['content'];
        ?>

        <form method="post" action="index.php?action=updateComment&controler=comment&id_comment=<?php echo $idCom; ?>&id_billet=<?php echo $id_billet; ?>" class="form">

            <?php
            if(isset($errors)) {
                echo "<div class='error'>";
                foreach($errors as $key2 => $error) {
                    echo "<ul class='error__list'><li class='error__list__item'><b>Erreur </b> : ".$error."</li></ul>";
                }
                echo "</div>";
            }
            ?>

            <div class="form__line">
                <label for="content" class="form__line__label form__line__label--top">Contenu *</label>
                <div class="my-tiny-container">
                    <textarea name="content" cols="1" rows="1" placeholder="Entrez ici le contenu de votre commentaire !" id="content" class="form__line__textarea"><?php echo $content; ?></textarea>
                </div>
            </div>

            <div class="form__line">
                <input type="submit" value="Mettre à jour mon commentaire" name="update-comment" class="button">
            </div>
        </form>
        <?php
    }
    ?>
</div>