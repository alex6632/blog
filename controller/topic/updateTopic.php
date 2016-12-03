<?php

require_once 'model/topic.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'update en base via le model...

function updateTopicAction() {
    global $template;

    $credentials = getPost();
    $errors = checkErrors($credentials);
    $id_billet = $_GET['id_billet'];

    if(empty($errors)) {
        updateTopic($credentials, $id_billet);

        $template = 'topic';

    } else {
        $template = 'update';
    }
}

function checkErrors($credentials) {

    global $errors;
    $errors = [];
    // TODO : Faire des vraies checks par fonction

    if( empty($credentials['title']) ) {
        $errors['title'] = "Le titre est obligatoire";
    }
    if( empty($credentials['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }
    // TODO : les autres verifs

    return $errors;
}


updateTopicAction();
