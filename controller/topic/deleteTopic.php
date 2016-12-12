<?php

require_once 'model/topic.php';

global $template;

$id_billet = $_GET['id_billet'];
deleteTopic($id_billet);
$template = 'profile';