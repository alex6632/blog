<h1>Inscription</h1>

<?php
if(isset($errors)) {
    foreach($errors as $key => $error) {
        echo "<ul><li style='color:red;'><b>Erreur </b><i>".$key."</i> : ".$error."</li></ul>";
    }
}
?>

<form method="post" action="index.php?action=inscription&controler=user">
    <div class="line">
        <label for="prenom">Prénom : </label>
        <input type="text" name="name" placeholder="Prénom" id="prenom" <?php if(isset($_POST['name'])) { echo "value='".$_POST['name']."'"; } ?> >
    </div>

    <div class="line">
        <label for="nom">Nom : </label>
        <input type="text" name="lastname" placeholder="Nom" id="nom" <?php if(isset($_POST['lastname'])) { echo "value='".$_POST['lastname']."'"; } ?> >
    </div>

    <div class="line">
        <label for="pseudo">Nom d'utilisateur<sup>*</sup> : </label>
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" id="pseudo" <?php if(isset($_POST['pseudo'])) { echo "value='".$_POST['pseudo']."'"; } ?> required>
    </div>

    <div class="line">
        <label for="email">Email<sup>*</sup> : </label>
        <input type="email" name="email" id="email" required>
    </div>


    <div class="line">
        <label for="pass">Mot de passe<sup>*</sup> : </label>
        <input type="password" name="pass" id="pass" required>
    </div>

    <div class="line">
        <label for="confpass">Vérification du mot de passe<sup>*</sup> : </label>
        <input type="password" name="confpass" id="confpass" required>
    </div>

    <div class="line">
        <label for="avatar">Avatar : </label>
        <input type="file" name="avatar" id="avatar">
    </div>

    <input type="submit" value="S'inscrire" name="inscription">
</form>
