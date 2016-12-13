<?php

require_once 'model/user.php';
require_once 'utils.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'update en base via le model...

function validationUserAction() {
    global $template;
    $email = $_GET['email'];
    updateTypeOfUser($email);
    $template = 'login';
}

validationUserAction();
