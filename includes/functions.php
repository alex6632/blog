<?php

function execute_query($query) {

    global $link;

    $result = mysqli_query($link, $query);

    if(!$result) {
        die('<br>Erreur de connexion (' . mysqli_errno($link) . ') ' . mysqli_error($link));
    }

    return $result;
}

function my_fetch_all($query) {

    $result = execute_query($query);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $data;
}

function escape($data) {
    global $link;

    return mysqli_escape_string($link, $data);
}

function getPost() {

    $credentials = [];

    foreach ($_POST as $k => $v) {
        $credentials[$k] = $v;
    }

    return ($credentials);
}