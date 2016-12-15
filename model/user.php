<?php

// change name with Model include
function userAuthModel($pseudo, $pass) {
    global $errors;

    $query = "SELECT * FROM users WHERE pseudo = '".escape($pseudo)."' AND pass = '".sha1($pass)."'";
    $results = my_fetch_all($query);
    if(count($results) < 1) {
        $errors['pseudo'] = "Nom d'utilisateur et/ou mot de passe sont incorrect(s)";
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
    $query = "SELECT * FROM users WHERE id_user = ".$_SESSION['user']['id_user'];
    $data = execute_query($query);
    return $data;
}

function selectInfoAllUser() {
    $query = "SELECT * FROM users";
    $data = execute_query($query);
    return $data;
}

function selectAuthorOfTopic($id_author) {
    $query = "SELECT pseudo FROM users WHERE id_user = ".$id_author;
    $data = execute_query($query);
    return $data;
}

function updateUser($credentials) {
    $query = "UPDATE users SET pseudo = '".$credentials['pseudo']."', name = '".$credentials['name']."', lastname = '".$credentials['lastname']."', avatar = '".$credentials['avatar']."', updated = '".date("Y-m-d H:i:s")."' WHERE id_user=".$_SESSION['user']['id_user'];
    execute_query($query);
}

function selectAuthorOfComment($id_user) {
    $query = "SELECT pseudo FROM users WHERE id_user = ".$id_user;
    $data = execute_query($query);
    return $data;
}

function validationUserAction($email) {
    $query = "UPDATE users SET account_check = 1 WHERE email=".$email;
    execute_query($query);
}

function accountAccepted($id_user) {
    $query = "UPDATE users SET account_check = 1 WHERE id_user=".$id_user;
    execute_query($query);
}

function accountNotAccepted($id_user) {
    $query = "UPDATE users SET account_check = 2 WHERE id_user=".$id_user;
    execute_query($query);
}

function bloggerAccepted($id_user) {
    $query = "UPDATE users SET type = 1 WHERE id_user=".$id_user;
    execute_query($query);
}

function bloggerNotAccepted($id_user) {
    $query = "UPDATE users SET type = 0 WHERE id_user=".$id_user;
    execute_query($query);
}

function sendAskUpToBlogger() {
    // set type to temporary number : 3
    $query = "UPDATE users SET type = 3 WHERE id_user=".$_SESSION['user']['id_user'];
    execute_query($query);
}

function deleteUser($id_user) {
    $query = "DELETE FROM users WHERE id_user=".$id_user;
    execute_query($query);
}