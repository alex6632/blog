<?php

require_once 'model/user.php';


function signUpAction() {
    global $template;

    $credentials = getPostSignUp();
    $errors = checkErrors($credentials);

    if(empty($errors)) {
        insertUser($credentials);

        $template = 'login';

    } else {
        $template = 'signup';
    }
}

function getPostSignUp() {
    $credentials = [];
    foreach ($_POST as $k => $v) {
        $credentials[$k] = $v;
    }
    //echo 'VERIF';
    //var_dump($credentials);
    return ($credentials);
}

function checkErrors($credentials) {

        global $errors;
        $errors = [];
        // TODO : Faire des vraies checks par fonction
        if( empty($credentials['pseudo']) ) {
            $errors['pseudo'] = "Le nom d'utilisateur est obligatoire";
        }
        if( empty($credentials['email']) ) {
            $errors['email'] = "L'email est obligatoire";
        }
        if( empty($credentials['pass']) ) {
            $errors['pass'] = "Le mot de passe est obligatoire";
        }
        if( empty($credentials['confpass']) || strcmp($credentials['pass'], $credentials['confpass']) != 0 ) {
            $errors['pass'] = "Les mots de passe doivent être identiques";
        }
        // TODO : les autres inputs
        return $errors;
}


signUpAction();


/*

inscriptionAction
    {
         get post
            --> array credientials

         function handle errors
            --> check name
            --> check pass
            //...

          sign_up
    }
*/