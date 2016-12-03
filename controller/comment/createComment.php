<?php

require_once 'model/comment.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'insertion en base via le model...

function createTopicAction() {
    global $template;

    $credentials = getPost();
    $errors = checkErrors($credentials);

    if(empty($errors)) {
        insertTopic($credentials);

        $template = 'topic';

    } else {
        $template = 'edit';
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


createTopicAction();
