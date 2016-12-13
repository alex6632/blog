<?php

require_once 'model/comment.php';

function updateCommentAction() {
    global $template;

    $comment = getPost();
    $errors = checkErrors($comment);
    $idCom = $_GET['id_comment'];
    $id_billet = $_GET['id_billet'];

    if(empty($errors)) {
        updateComment($comment, $idCom);

        header('Location: index.php?action=topic&id_billet='.$id_billet);

    } else {
        $template = 'updateComment';
    }
}

function checkErrors($comment) {
    global $errors;
    $errors = [];

    if (empty($comment['content']) ) {
        $errors['content'] = "Le contenu est obligatoire";
    }

    return $errors;
}


updateCommentAction();
