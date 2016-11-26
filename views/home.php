<h1>Accueil</h1>

<?php if(isset($_SESSION['user'])) { ?>

    <a href="?action=deconnexion">Deconnexion</a>

<?php } else { ?>

    <a href="?action=signup">Inscription</a>
    <a href="?action=login">Connexion</a>

<?php } ?>