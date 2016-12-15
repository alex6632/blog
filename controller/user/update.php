<?php

require_once 'model/user.php';
require_once 'utils.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'update en base via le model...

function updateUserAction() {
    global $template;

    $credentials = getPost();
    $errors = checkSignUpErrors($credentials);

    if(empty($errors)) {
        updateUser($credentials);
        if (isset($credentials['blogger'])) {
            sendAskUpToBlogger();
        }
        $template = 'profile';

    } else {
        $template = 'updateProfile';
    }
}

/*
 *  Check the errors on the SignUp form
 */
function checkSignUpErrors($credentials) {
    global $errors;
    $errors = [];

    if (!checkName($credentials['name']))
        $errors['name'] = 'Le prénom ne doit contenir que des caractères alphabétiques.';

    if (!checkName($credentials['lastname']))
        $errors['lastname'] = 'Le nom ne doit contenir que des caractères alphabétiques.';

    return $errors;
}

updateUserAction();
