<?php

require_once 'model/user.php';

global $template;

$id_user = $_GET['id_user'];
bloggerAccepted($id_user);
$template = 'dashboard';
