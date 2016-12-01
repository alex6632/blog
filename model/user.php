<?php

// change name with Model include
function userAuthModel($pseudo, $pass) {

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

function checkUnique($col, $content) {
    $query = "SELECT ".$col." FROM users WHERE ".$col." = '".escape($content)."'";
    $res = my_fetch_all($query);
    if ((count($res)) > 0) {
        return (false);
    }
    return (true);
}

function insertUserModel($credentials) {

    $query = "INSERT INTO users(pseudo, email, pass, name, lastname, avatar, created, updated) VALUES('".$credentials['pseudo']."', '".$credentials['email']."', '".sha1($credentials['pass'])."', '".$credentials['name']."', '".$credentials['lastname']."', '".$credentials['avatar']."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";

    execute_query($query);
}

function selectInfoUser() {

    $query = "SELECT * FROM users WHERE id_user = ".$_SESSION['id_user'];

    $data = execute_query($query);

    return $data;
}