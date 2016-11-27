<div class="bloc-title">
    <div class="container">
        <h1>Nouveau article</h1>
    </div>
</div>

<div class="container">
    <form method="post" action="index.php?action=edit&controler=user" class="form">

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
                <option value="bullshit">Bullshit</option>
                <option value="php">PHP</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="design">Design</option>
                <option value="framework">Framework</option>
                <option value="veille">Veille</option>
            </select>
        </div>

        <div class="form__line">
            <label for="title" class="form__line__label">Titre *</label>
            <input type="input" name="pass" placeholder="Mon super article !" id="title" class="form__line__input">
        </div>

        <div class="form__line">
            <label for="content" class="form__line__label form__line__label--top">Contenu *</label>
            <textarea name="content" cols="1" rows="1" placeholder="Entrez ici le contenu de votre article !" id="content" class="form__line__textarea"></textarea>
        </div>

        <input type="submit" value="Créer cet article" name="createTopic" class="button">

        <p class="form__info">* Ces champs sont obligatoire pour créer un nouveau article.</p>
    </form>
</div>