<?php

function insertTopic($credentials) {

    $content = addslashes(nl2br($credentials['content']));

    $query = "INSERT INTO billet(title, content, created, updated, id_user, id_category) VALUES('".$credentials['title']."', '".$content."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', ".$_SESSION['id_user'].", ".$credentials['category'].")";

    execute_query($query);
}

function selectInfoLastBillet() {

    $query = "SELECT * FROM billet LIMIT 8";

    $data = execute_query($query);

    return $data;
}