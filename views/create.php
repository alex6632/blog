<div class="bloc-title">
    <div class="container">
        <h1>Nouvel article</h1>
    </div>
</div>

<div class="container">
    <form method="post" action="index.php?action=createTopic&controler=user" class="form form--lg">

        <?php
        if(isset($errors)) {
            echo "<div class='error'>";
            foreach($errors as $key => $error) {
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
                require_once 'model/category.php';
                $data = selectCategory();

                foreach ($data as $key => $value) {

                    $name = $value['name'];
                    $id_category = $value['id_category'];

                    echo "<option value='".$id_category."'>".$name."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form__line">
            <label for="title" class="form__line__label">Titre *</label>
            <input type="input" name="title" placeholder="Mon super article !" id="title" class="form__line__input" <?php if(isset($_POST['title'])) { echo "value='".$_POST['title']."'"; } ?> required >
        </div>

        <div class="form__line">
            <label for="content" class="form__line__label form__line__label--top">Contenu *</label>
            <div class="my-tiny-container">
                <textarea name="content" cols="1" rows="1" placeholder="Entrez ici le contenu de votre article !" id="content" class="form__line__textarea" required><?php if(isset($_POST['content'])) { echo "value='".$_POST['content']."'"; } ?></textarea>
            </div>
        </div>

        <input type="submit" value="Créer cet article" class="button">

        <p class="form__info">* Ces champs sont obligatoire pour créer un nouveau article.</p>
    </form>
</div>