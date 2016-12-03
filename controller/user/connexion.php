<?php

require_once 'model/user.php';
require_once 'utils.php';


/*
 * User Login action
 */
function loginAction() {
    global $template;
    global $errors;

    $credentials = getPost();
    $errors = checkLoginErrors($credentials);
    if (!empty($errors)) {
        $template = 'login';
    }
    else {
        $user = userAuthModel($credentials['pseudo'], $credentials['pass']);
        if (!$user) {
            $template = 'login';
        } else if ($user['account_check'] == 0) {
            $errors['pseudo'] = 'Votre compte n\'est pas vérifié. 
            Veuillez valider le compte avec le mail reçu sur votre boîte de réception.';
            $template = 'login';
        } else{
            $_SESSION['id_user'] = $user['id_user'];
            $template = 'profile';
        }
    }

}

/*
 *  Check the errors on the Login form
 */
function checkLoginErrors($credentials) {
    global $errors;
    $errors = [];

    if (!isset($credentials['pseudo']) || empty($credentials['pseudo']))
        $errors['pseudo'] = 'Le nom d\'utilisateur est obligatoire';

    if (!isset($credentials['pass']) || empty($credentials['pass']))
        $errors['pass'] = 'Le mot de passe est obligatoire';

    return $errors;
}

loginAction();