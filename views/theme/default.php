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
            <a href="index.php"><h1 class="h1">Wesh blog</h1></a>
            <?php if(isset($_SESSION['user'])) { ?>

                <a href="?action=deconnexion&controler=user" class="inline-b link link--bg">Deconnexion</a>

            <?php } else { ?>

                <a href="?action=signup" class="inline-b link">S'inscrire</a>
                <a href="?action=login" class="inline-b link link--bg">Se connecter</a>

            <?php } ?>
        </div>
    </header>

    <div class="main-presentation">
        <div class="container">
            <div class="w50">
                <div class="main-presentation__title">Bienvenue sur notre blog !</div>
                <p class="main-presentation__desc">Inscrivez-vous sans plus attendre pour pouvoir intéragir avec la communauté et partager toutes vos aventures les plus folles !</p>
            </div>

            <div class="w50">
                <div class="main-presentation__block">
                    <div class="main-presentation__block__avatar">
                        <img src="images/alex.jpg" alt="">
                    </div>
                    <div class="main-presentation__block__name">Alexandre Simonin</div>
                    <div class="main-presentation__block__function">Développeur full stack</div>
                </div>

                <div class="main-presentation__block">
                    <div class="main-presentation__block__avatar">
                        <img src="images/kev.jpg" alt="">
                    </div>
                    <div class="main-presentation__block__name">Kevin Loiseleur</div>
                    <div class="main-presentation__block__function">Développeur full stack</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php include 'views/'.$template.'.php'; ?>
    </div>

    <footer class="main-footer">
        <p class="main-footer__desc">Blog réalisé par Kevin Loiseleur et Alexandre Simonin, étudiants en M1-Developpement à l'ECV Digital de Paris</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/bundle.js"></script>
</body>
</html>
