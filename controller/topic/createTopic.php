<?php

require_once 'model/topic.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'insertion en base via le model...

function createTopicAction() {
    global $template;

    $credentials = getPost();
    $errors = checkErrors($credentials);

    if(empty($errors)) {
        $last_id_topic = insertTopic($credentials);
        foreach ($last_id_topic as $key => $value) {
            $_SESSION['last_id_topic'] = $value['id_billet'];
        }
        $template = 'topic';
    } else {
        $template = 'create';
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
