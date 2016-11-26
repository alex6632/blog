<h1>Inscription</h1>

<?php
if(isset($errors)) {
    foreach($errors as $key => $error) {
        echo "<ul><li style='color:red;'><b>Erreur </b><i>".$key."</i> : ".$error."</li></ul>";
    }
}
?>

<form method="post" action="index.php?action=inscription">
    <div class="line">
        <label for="pseudo">Nom d'utilisateur</label>
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" id="pseudo" <?php if(isset($_POST['pseudo'])) { echo "value='".$_POST['pseudo']."'"; } ?>>
    </div>

    <div class="line">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>


    <div class="line">
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>

    <div class="line">
        <label for="confpass">Vérification du mot de passe</label>
        <input type="password" name="confpass" id="confpass">
    </div>

    <input type="submit" value="S'inscrire" name="inscription">
</form>
