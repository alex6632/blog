<?php

function bdd_connect() {

    global $link;

    $link = mysqli_connect('localhost', 'root', '', 'blog');

    $link->set_charset("utf8");

    if (!$link) {
        die('Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
}

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