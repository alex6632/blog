<div class="container admin-container-errors">
<?php
if(isset($errors)) {
    echo "<div class='error'>";
    foreach($errors as $key => $error) {
        echo "<ul class='error__list'><li class='error__list__item'><b>Erreur </b> : ".$error."</li></ul>";
    }
    echo "</div>";
}
?>
</div>

<form method="post" action="admin.php?action=connexionAdmin&controler=user" class="admin-form">

    <div class="admin-form__line">
        <label for="pseudo" class="admin-form__line__label">Nom d'utilisateur</label>
        <input type="text" name="pseudo" placeholder="ex : r_dupont" class="admin-form__line__input" id="pseudo" <?php if(isset($_POST['pseudo'])) { echo "value='".htmlspecialchars($_POST['pseudo'])."'"; } ?>>
    </div>

    <div class="admin-form__line">
        <label for="pass" class="admin-form__line__label">Mot de passe</label>
        <input type="password" name="pass" placeholder="*********" id="pass" class="admin-form__line__input">
    </div>


    <input type="submit" value="Se connecter" name="connexion" class="button">
</form>
