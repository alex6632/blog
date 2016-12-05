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
            sendMailAskBlogger($credentials);
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

    if (($err = checkPseudo($credentials['pseudo'])) !== 0) {
        if ($err === -1) {
            $errors['pseudo'] = 'Le pseudo est un champs obligatoire';
        }
        else if ($err === -2) {
            $errors['pseudo'] = 'Ce pseudo est déjà utilisé, veuillez en choisir un autre';
        }
        else if ($err === -3) {
            $errors['pseudo'] = 'Le pseudo doit être compris entre 3 et 10 caractères';
        }
        else if ($err === -4) {
            $errors['pseudo'] = 'Le pseudo ne doit contenir que des caractères alphanumériques';
        }
    }

    return $errors;
}

updateUserAction();
