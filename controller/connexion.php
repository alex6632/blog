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

if(!$user) {
    $template = 'login';
} else {
    $_SESSION['user'] = $user['id_user'];
    $template = 'home';
}