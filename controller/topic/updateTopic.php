<?php

require_once 'model/topic.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'update en base via le model...

function updateTopicAction() {
    global $template;

    $topic = getPost();
    $errors = checkErrors($topic);
    $id_billet = $_GET['id_billet'];

    if(empty($errors)) {
        updateTopic($credentials, $id_billet);

        $template = 'topic';

    } else {
        $template = 'update';
    }
}

function checkErrors($topic) {
    global $errors;
    $errors = [];

    if ()
    if (empty($topic['title']) ) {
        $errors['title'] = "Le titre est obligatoire";
    }
    if (empty($topic['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }

    return $errors;
}


updateTopicAction();
