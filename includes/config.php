<?php

function bdd_connect() {

    global $link;

    $link = mysqli_connect('localhost', 'root', 'toor', 'blog');

    $link->set_charset("utf8");

    if (!$link) {
        die('Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
}