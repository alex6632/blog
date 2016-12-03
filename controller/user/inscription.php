<?php

require_once 'model/user.php';
require_once 'utils.php';


/*
 *  User SignUp Action
 */
function signUpAction() {
    global $template;

    $credentials = getPost();
    $errors = checkSignUpErrors($credentials);
    // PHOTO AVATAR

    if(empty($errors)) {
        insertUserModel($credentials);
        if (isset($credentials['blogger'])) {
            sendMailAskBlogger($credentials);
        }
        sendMailSignUp($credentials);
        $template = 'login';
    } else {
        $template = 'signup';
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

    if(($err = checkEmail($credentials['email'])) !== 0) {
        if ($err === -1) {
            $errors['email'] = 'L\'addresse mail est un champ obligatoire';
        }
        else if ($err === -2) {
            $errors['email'] = 'Cette addresse mail est déjà untilisée, veuillez en choisir une autre';
        }
        else if ($err === -3) {
            $errors['email'] = 'Cette addresse mail n\'est pas valide';
        }
    }

    if (($err = checkPasswd($credentials['pass'], $credentials['confpass'])) !== 0) {
        if ($err === -1) {
            $errors['pass'] = 'Le mot de passe est un champs obligatoire';
        }
        else if ($err === -2) {
            $errors['pass'] = 'Le mot de passe doit faire au minimum 6 caractères';
        }
        else if ($err === -3) {
            $errors['pass'] = 'Le mot de passe et la vérification ne sont pas similaires';
        }
    }
    return $errors;
}

signUpAction();

