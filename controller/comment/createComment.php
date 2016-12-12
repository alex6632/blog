<?php

require_once 'model/comment.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'insertion en base via le model...

function createCommentAction() {
    global $template;

    $credentials = getPost();
    $errors = checkErrors($credentials);

    if(empty($errors)) {
        insertComment($credentials);

        $template = 'topic';

    } else {
        $template = 'topic';
    }
}

function checkErrors($credentials) {

    global $errors;
    $errors = [];
    // TODO : Faire des vraies checks par fonction

    if( empty($credentials['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }
    // TODO : les autres verifs

    return $errors;
}


createTopicAction();
