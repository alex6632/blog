<div class="bloc-title">
    <div class="container">
        <h1>Mettre à jour son profil</h1>
    </div>
</div>

<div class="container">
    <?php
    require_once 'model/user.php';

    $data = selectInfoUser();
    foreach ($data as $key => $value) {
        (isset($_POST['name']) && !empty($_POST['name'])) ? $name = $_POST['name'] : $name = $value['name'];
        (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? $lastname = $_POST['lastname'] : $lastname = $value['lastname'];
        //(isset($_POST['pseudo']) && !empty($_POST['pseudo'])) ? $pseudo = $_POST['pseudo'] : $pseudo = $value['pseudo'];
        $pseudo = $value['pseudo'];
        $avatar = $value['avatar'];
        $type = $value['type'];
    ?>

    <form method="post" action="index.php?action=update&controler=user" class="form">

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
            <label for="avatar" class="form__line__label">Avatar : </label>
            <div class="form__line__input form__line__input--upload">
                Cliquez ici pour uploader un avatar
                <input type="file" name="avatar" id="avatar">
            </div>
        </div>

        <div class="form__line">
            <label for="prenom" class="form__line__label">Prénom : </label>
            <input type="text" name="name" placeholder="Prénom" class="form__line__input" id="prenom" value="<?php echo htmlspecialchars($name); ?>">
        </div>

        <div class="form__line">
            <label for="nom" class="form__line__label">Nom : </label>
            <input type="text" name="lastname" placeholder="Nom" class="form__line__input" id="nom" value="<?php echo htmlspecialchars($lastname); ?>" >
        </div>

        <div class="form__line">
            <label for="pseudo" class="form__line__label">Nom d'utilisateur * : </label>
            <div class="form__line__input disabled"><?php echo htmlspecialchars($pseudo); ?></div>
        </div>
        <?php if($type == 0) { ?>
        <div class="form__line">
            <input type="checkbox" name="blogger" class="form__line__check" id="type">
            <label for="type" class="form__line__label form__line__label--full form__line__label--check">Je souhaite être blogger (possibilité d'écrire des articles) :</label>
        </div>
        <?php } ?>

        <div class="form__line">
            <input type="submit" value="Mettre à jour mes informations personnelles" name="update-profile" class="button">
            <a href="?action=profile" class="link link--right">Annuler</a>
        </div>
    </form>
    <?php
    }
    ?>
</div>