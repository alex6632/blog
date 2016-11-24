<?php

function inscription() {

    $errors = [];
    if( empty($_POST['pseudo']) ) {
        $errors['pseudo'] = "Le nom d'utilisateur est obligatoire";
    }
    if( empty($_POST['email']) ) {
        $errors['email'] = "L'email est obligatoire";
    }
    if( empty($_POST['pass']) ) {
        $errors['pass'] = "Le mot de passe est obligatoire";
    }
    if( empty($_POST['confpass']) || strcmp($_POST['pass'], $_POST['confpass']) != 0 ) {
        $errors['pass'] = "Les mots de passe doivent être identiques";
    }

    return $errors;
}




$errors = inscription();

if(empty($errors)) {

    $query = "INSERT INTO users(pseudo, email, pass) VALUES('".$_POST['pseudo']."', '".$_POST['email']."', '".sha1($_POST['pass'])."')";

    execute_query($query);
    $template = 'home';

} else {
    $template = 'signup';
}