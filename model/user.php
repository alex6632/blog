<?php

function user_auth($pseudo, $pass) {

    global $errors;

    $query = "SELECT * FROM users WHERE pseudo = '".escape($pseudo)."' AND pass = '".sha1($pass)."'";

    $results = my_fetch_all($query);

    if(count($results) < 1) {
        $errors['pseudo'] = "identifiants incorrects";
        return false;
    } else {
        return $results[0];
    }
}

