<?php

function insertTopic($credentials) {

    $content = addslashes(nl2br($credentials['content']));
    $query = "INSERT INTO billet(title, content, created, updated, id_user, id_category) VALUES('".$credentials['title']."', '".$content."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', ".$_SESSION['id_user'].", ".$credentials['category'].")";
    execute_query($query);
}

function updateTopic($credentials, $id_billet) {

    $content = addslashes(nl2br($credentials['content']));
    $query = "UPDATE billet SET title = '".$credentials['title']."', content = '".$content."', updated = '".date("Y-m-d H:i:s")."', id_category = ".$credentials['category']." WHERE id_billet='".$id_billet."'";
    execute_query($query);
}

function selectInfoBillet($id_billet) {

    $query = "SELECT * FROM billet WHERE id_billet = ".$id_billet;
    $data = execute_query($query);
    return $data;
}

function selectInfoLastBillet() {

    $query = "SELECT * FROM billet LIMIT 8";
    $data = execute_query($query);
    return $data;
}