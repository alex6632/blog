<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/default.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <title></title>
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="index.php"><h1 class="h1">Wesh blog - Interface d'administration</h1></a>

        <?php if(isset($_SESSION['user']['id_user'])) { ?>
            <a href="?action=deconnexion&controler=user" class="inline-b link link--bg">Deconnexion</a>
        <?php } ?>
    </div>
</header>

<?php include 'views/'.$template.'.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="scripts/bundle.js"></script>
</body>
</html>
