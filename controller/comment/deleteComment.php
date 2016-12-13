<?php

require_once 'model/comment.php';

global $template;

$idCom = $_GET['id_comment'];
deleteComment($idCom);
header('Location: index.php?action=topic&id_billet='.$idCom);