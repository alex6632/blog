<div class="bloc-title">
    <div class="container">
        <h1>Nouvel article</h1>
    </div>
</div>

<div class="container">
    <?php
    require_once 'model/topic.php';
    require_once 'model/category.php';

    $id_billet = $_GET['id_billet'];

    $data = selectInfoBillet($id_billet);
    foreach ($data as $key => $value) {
        $title = $value['title'];
        $content = $value['content'];
        $current_id = $value['id_category'];
    ?>


    <form method="post" action="index.php?action=updateTopic&controler=topic&id_billet=<?php echo $id_billet; ?>" class="form form--lg">

        <?php
        if(isset($errors)) {
            echo "<div class='error'>";
            foreach($errors as $keyy => $error) {
                echo "<ul class='error__list'><li class='error__list__item'><b>Erreur </b> : ".$error."</li></ul>";
            }
            echo "</div>";
        }
        ?>

        <div class="form__line form__line--rel">
            <label for="categorie" class="form__line__label">Catégorie *</label>
            <img src="images/arrow.png" class="form__line__select__arrow" alt="">
            <select name="category" id="categorie" class="form__line__select">
                <?php

                $data2 = selectCategory();

                foreach ($data2 as $key2 => $value2) {

                    $name = $value2['name'];
                    $id_category = $value2['id_category'];

                    ?><option value="<?php echo $id_category; ?>" <?php if($id_category == $current_id){ echo 'selected'; }?> ><?php echo $name; ?></option><?php
                }
                ?>
            </select>
        </div>

        <div class="form__line">
            <label for="title" class="form__line__label">Titre *</label>
            <input type="input" name="title" placeholder="Mon super article !" id="title" class="form__line__input" value="<?php echo $title; ?>">
        </div>

        <div class="form__line">
            <label for="content" class="form__line__label form__line__label--top">Contenu *</label>
            <div class="my-tiny-container">
                <textarea name="content" cols="1" rows="1" placeholder="Entrez ici le contenu de votre article !" id="content" class="form__line__textarea"><?php echo htmlspecialchars($content); ?></textarea>
            </div>
        </div>

        <input type="submit" value="Enregistrer les modifications" class="button">

        <p class="form__info">* Ces champs sont obligatoire pour créer un nouveau article.</p>
    </form>
    <?php
    }
    ?>
</div>