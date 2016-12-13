<?php

function insertComment($credentials, $id_billet) {

    $content = addslashes(nl2br($credentials['content']));
    $query = "INSERT INTO commentaire(content, created, updated, id_user, id_billet) VALUES('".$content."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', ".$_SESSION['user']['id_user'].", ".$id_billet.")";
    execute_query($query);
}

function updateComment($credentials, $id_comment) {

    $content = addslashes(nl2br($credentials['content']));
    $query = "UPDATE commentaire SET content = '".$content."', updated = '".date("Y-m-d H:i:s")."' WHERE id_comment=".$id_comment;
    execute_query($query);
}

function selectInfoCommentOfBilletWithOrder($id_billet) {

    $query = "SELECT * FROM commentaire WHERE id_billet = ".$id_billet." ORDER BY created DESC";
    $data = execute_query($query);
    return $data;
}

function selectInfoComment($id_comment) {

    $query = "SELECT * FROM commentaire WHERE id_comment = ".$id_comment;
    $data = execute_query($query);
    return $data;
}

function selectNbOfCommentByTopic($id_billet) {

    $query = "SELECT * FROM commentaire WHERE id_billet = ".$id_billet;
    $results = my_fetch_all($query);
    $data = count($results);
    return $data;
}

function deleteComment($idCom) {

    $query = "DELETE FROM commentaire WHERE id_comment = ".$idCom;
    execute_query($query);
}