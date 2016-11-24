<?php
session_start();

$page = 'home';
$layout = 'default';

// connect to bdd...
require_once 'includes/functions.php';

bdd_connect();

if(!empty($_GET['action'])) {
    $page = $_GET['action'];
}

$template = $page;

/*
 * Controller
 */
if(file_exists('controller/'.$page.'.php')) {
    include 'controller/'.$page.'.php';
}

include 'views/theme/'.$layout.'.php';
