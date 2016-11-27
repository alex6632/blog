<?php

function user_auth($pseudo, $pass) {

    global $errors;

    $query = "SELECT * FROM users WHERE pseudo = '".escape($pseudo)."' AND pass = '".sha1($pass)."'";

    $results = my_fetch_all($query);

    if(count($results) < 1) {
        $errors['pseudo'] = "Nom d'utilisateur et/ou mot de passe incorrect(s)";
        return false;
    } else {
        return $results[0];
    }
}

function insertUser($credentials) {

    $query = "INSERT INTO users(pseudo, email, pass, name, lastname, avatar, created, updated) VALUES('".$credentials['pseudo']."', '".$credentials['email']."', '".sha1($credentials['pass'])."', '".$credentials['name']."', '".$credentials['lastname']."', '".$credentials['avatar']."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";

    execute_query($query);
}