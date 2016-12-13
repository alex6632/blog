<?php

require_once 'model/comment.php';

global $template;

$idCom = $_GET['id_comment'];
$id_billet = $_GET['id_billet'];
deleteComment($idCom);
header('Location: index.php?action=topic&id_billet='.$id_billet);