<?php
session_start();

$page = 'home';
$layout = 'default';
$controler = '';

// connect to bdd...
require_once 'includes/functions.php';
require_once 'includes/config.php';

bdd_connect();

if(!empty($_GET['action'])) {
    $page = $_GET['action'];
}

$template = $page;


if(!empty($_GET['controler'])) {
    $controler = $_GET['controler'];
}

/*
 * Controller
 */
if(file_exists('controller/'.$controler.'/'.$page.'.php')) {
    include 'controller/'.$controler.'/'.$page.'.php';
}

include 'views/theme/'.$layout.'.php';
