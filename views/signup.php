<div class="bloc-title">
    <div class="container">
        <h1>S'inscrire</h1>
    </div>
</div>

<div class="container">
    <form method="post" action="index.php?action=inscription&controler=user" class="form">

        <?php
        if(isset($errors)) {
            echo "<div class='error'>";
            foreach($errors as $key => $error) {
                echo "<ul class='error__list'><li class='error__list__item'><b>Erreur </b> : ".$error."</li></ul>";
            }
            echo "</div>";
        }
        ?>

        <div class="form__line">
            <label for="prenom" class="form__line__label">Prénom : </label>
            <input type="text" name="name" placeholder="Prénom" class="form__line__input" id="prenom" <?php if(isset($_POST['name'])) { echo "value='".$_POST['name']."'"; } ?> >
        </div>

        <div class="form__line">
            <label for="nom" class="form__line__label">Nom : </label>
            <input type="text" name="lastname" placeholder="Nom" class="form__line__input" id="nom" <?php if(isset($_POST['lastname'])) { echo "value='".$_POST['lastname']."'"; } ?> >
        </div>

        <div class="form__line">
            <label for="pseudo" class="form__line__label">Nom d'utilisateur * : </label>
            <input type="text" name="pseudo" placeholder="Nom d'utilisateur" class="form__line__input" id="pseudo" <?php if(isset($_POST['pseudo'])) { echo "value='".$_POST['pseudo']."'"; } ?> required>
        </div>

        <div class="form__line">
            <label for="email" class="form__line__label">Email * : </label>
            <input type="email" name="email" placeholder="toto@toto.fr" class="form__line__input" id="email" required>
        </div>


        <div class="form__line">
            <label for="pass" class="form__line__label">Mot de passe * : </label>
            <input type="password" name="pass" placeholder="******" class="form__line__input" id="pass" required>
        </div>

        <div class="form__line">
            <label for="confpass" class="form__line__label">Vérification du mot de passe * : </label>
            <input type="password" name="confpass" placeholder="******" class="form__line__input" id="confpass" required>
        </div>

        <div class="form__line">
            <label for="avatar" class="form__line__label">Avatar : </label>
            <div class="form__line__input form__line__input--upload">
                Cliquez ici pour uploader un avatar
                <input type="file" name="avatar" id="avatar">
            </div>
        </div>

        <div class="form__line">
            <input type="checkbox" name="blogger" class="form__line__check" id="type">
            <label for="type" class="form__line__label form__line__label--full form__line__label--check">Je souhaite être blogger (possibilité d'écrire des articles) ** :</label>
        </div>

        <div class="form__line">
            <input type="submit" value="S'inscrire" name="inscription" class="button">
        </div>

        <p class="form__info">* Ces champs sont obligatoire pour finaliser l'inscription.</p>
        <p class="form__info">** Vous pourrez toujours décider de faire la demande une fois l'inscription terminée, dans votre profil.</p>
    </form>
</div>