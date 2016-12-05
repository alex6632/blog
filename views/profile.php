<div class="bloc-title">
    <div class="container">
        <h1>Mon profil</h1>
    </div>
</div>

<div class="container">
    <?php
        require_once 'model/user.php';

        $data = selectInfoUser();

        foreach ($data as $key => $value) {

            $name = $value['name'];
            $lastname = $value['lastname'];
            $pseudo = $value['pseudo'];
            $email = $value['email'];
            $created = $value['created'];
            $updated = $value['updated'];

            ?>
            <div class="profile">
                <div class="profile__avatar">
                    <img src="images/camera.svg" alt="camera" class="profile__avatar__inner">
                </div>
                <div class="profile__title"><span>Bonjour</span><i><?php echo $name.' '.$lastname; ?></i> !</div>

                <h2 class="profile__infos">Mes informations</h2>

                <ul class="profile__list">
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre prénom</span><span class="profile__list__item__rep"><?php echo $name; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre nom</span><span class="profile__list__item__rep"><?php echo $lastname; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre nom d'utilisateur</span><span class="profile__list__item__rep"><?php echo $pseudo; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre email</span><span class="profile__list__item__rep"><?php echo $email; ?></span></li>
                </ul>
                <ul class="profile__list">
                    <li class="profile__list__item"><span class="profile__list__item__span">Compte crée le</span><span class="profile__list__item__rep"><?php echo $created; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Dernière mise à jour le</span><span class="profile__list__item__rep"><?php echo $updated; ?></span></li>
                </ul>
                <a href="?action=updateProfile" class="inline-b link link--bg">Modifier mes informations personnelles</a>
            </div>
            <?php

        }
    ?>
</div>