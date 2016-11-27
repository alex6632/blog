<?php

require_once 'model/user.php';

function connexion() {

    global $errors;
    $errors = [];

    if( empty($_POST['pseudo']) ) {
        $errors['pseudo'] = "Le nom d'utilisateur est obligatoire";
    }
    if( empty($_POST['pass']) ) {
        $errors['pass'] = "Le mot de passe est obligatoire";
    }
    if(!empty($errors)) {
        return false;
    }

    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass'];

    return user_auth($pseudo, $pass);
}

$user = connexion();

// SI il n'y a pas d'utilisateurs correspondant au login et mdp entré, on re affiche le formulaire de connexion SINON on enregistre en session l'id de l'utilisateur et on le renvoie sur la page d'accueil !
if(!$user) {
    $template = 'login';
} else {
    $_SESSION['id_user'] = $user['id_user'];
    $template = 'profile';
}