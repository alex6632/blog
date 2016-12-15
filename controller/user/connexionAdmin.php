<?php

require_once 'model/user.php';
require_once 'utils.php';


/*
 * User Login action
 */
function loginAction() {
    global $template;
    global $errors;
    global $layout;

    $credentials = getPost();
    $errors = checkLoginErrors($credentials);
    if (!empty($errors)) {
        if($layout == 'default') {
            $template = 'login';
        } else if($layout == 'admin') {
            $template = 'admin-login';
        }
    }
    else {
        $user = userAuthModel($credentials['pseudo'], $credentials['pass']);
        if (!$user) {
            if($layout == 'default') {
                $template = 'login';
            } else if($layout == 'admin') {
                $template = 'admin-login';
            }
        } else if ($user['account_check'] == 0) {
            $errors['pseudo'] = 'Votre compte n\'est pas vérifié. 
            Veuillez attendre confirmation de l\'administrateur';
            if($layout == 'default') {
                $template = 'login';
            } else if($layout == 'admin') {
                $template = 'admin-login';
            }
        } else {
            if($layout == 'default') {
                $_SESSION['user'] = $user;
                $template = 'profile';
            } else if($layout == 'admin') {
                $_SESSION['user'] = $user;
                $template = 'dashboard';
            }
        }
    }

}

/*
 *  Check the errors on the Login form
 */
function checkLoginErrors($credentials) {
    global $errors;
    $errors = [];

    if (!isset($credentials['pseudo']) || empty($credentials['pseudo'])) {
        $errors['pseudo'] = 'Le nom d\'utilisateur est obligatoire';
    }
        if ($_SESSION['user']['type'] != 2) {
            $errors['user'] = "Vous n'avez pas les droits pour écrire un article";
        }
    if (!isset($credentials['pass']) || empty($credentials['pass'])) {
        $errors['pass'] = 'Le mot de passe est obligatoire';
    }
    return $errors;
}

loginAction();