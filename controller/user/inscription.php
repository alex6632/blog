<?php

require_once 'model/user.php';
require_once 'utils.php';


/*
 *  USER SIGNUP ACTION
 */
function signUpAction() {
    global $template;

    $credentials = getPost();
    $errors = checkSignUpErrors($credentials);
    // PHOTO AVATAR



    if(empty($errors)) {
        insertUserModel($credentials);
        $template = 'login';
        // ENVOIE MAIL CONFIRMATION
        // ENVOIE MAIL AU ADMINS POUR POUVOIR ECRIRE UN ARTICLE ?
    } else {
        $template = 'signup';
    }
}


/*
 *  CHECK THE ERRORS IN THE SIGNUP FORM
 */
function checkSignUpErrors($credentials) {

    global $errors;
    $errors = [];

    // checkGoodForm($credentials) ADD HIDEN INPUT TO CHECK GOOD FORM
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

    // CHECK AVATAR
    // CHECK SIGNATURE FORM TO RECEIVE ONLY THE GOOD FORM FROM SIGNUP VIEW (hidden input ?)
    return $errors;
}

signUpAction();

