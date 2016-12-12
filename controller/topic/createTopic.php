<?php

require_once 'model/topic.php';

// TODO : Comme l'inscription, vérifier ce que l'utilisateur a remplie puis faire l'insertion en base via le model...

function createTopicAction() {
    global $template;

    $credentials = getPost();
    $errors = checkErrorsCreateTopic($credentials);
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

function checkErrorsCreateTopic($credentials) {
    global $errors;
    $errors = [];

    if (!isset($_SESSION['user']['id_user']) || empty($_SESSION['user']['id_user'])) {
        $errors['user'] = "Vous n'êtes pas authentifiés, veuillez vous connecter";
    }
    if ($_SESSION['user']['type'] >= 0) {
        $errors['user'] = "Vous n'avez pas les droits pour écrire un article";
    }
    if( empty($credentials['title']) ) {
        $errors['title'] = "Le titre est obligatoire";
    }
    if( empty($credentials['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }
    return $errors;
}


createTopicAction();
