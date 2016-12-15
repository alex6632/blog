<?php

require_once 'model/comment.php';

function createCommentAction() {
    global $template;

    $comment = getPost();
    $id_billet = $_GET['id_billet'];
    $errors = checkErrors($comment);

    if(empty($errors)) {
        insertComment($comment, $id_billet);
        $template = 'topic';
    } else {
        $template = 'topic';
    }
}

function checkErrors($comment) {

    global $errors;
    $errors = [];

    if( empty($comment['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }
    return $errors;
}


createCommentAction();
