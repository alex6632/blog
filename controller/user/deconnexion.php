<?php


// On efface la variable de session lié à l'utilisateur et on le redirige vers la page d'accueil

unset($_SESSION['user']);
if($layout == 'default') {
    $template = 'home';
} else if($layout == 'admin') {
    $template = 'admin-login';
}