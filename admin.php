<?php
session_start();

if(isset($_SESSION['user']['id_user'])) {
    $page = 'dashboard';
} else {
    $page = 'admin-login';
}

$layout = 'admin';
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
