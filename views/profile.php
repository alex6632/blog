<div class="bloc-title">
    <div class="container">
        <h1>Mon profil</h1>
    </div>
</div>

<div class="container">
    <?php
        $data = selectInfoUser();

        foreach ($data as $key => $value) {

            $name = $value['name'];
            $lastname = $value['lastname'];
            $pseudo = $value['pseudo'];
            $email = $value['email'];
            $created = $value['created'];

            echo '<div class="profile__title">Bonjour '.$name.' '.$lastname.' !</div>';

            echo '<div class="profile__infos">Mes informations</div>';

            echo '<ul>';
                echo '<li><span>Compte crée le : </span>'.$created.'</li>';
                echo '<li><span>Votre prénom : </span>'.$name.'</li>';
                echo '<li><span>Votre nom : </span>'.$lastname.'</li>';
                echo '<li><span>Votre nom d\'utilisateur : </span>'.$pseudo.'</li>';
                echo '<li><span>Votre email : </span>'.$email.'</li>';
            echo '</ul>';

            echo '<a href="?action=updateProfile&controler=user">Modifier mes informations personnelles</a>';
        }
    ?>
</div>