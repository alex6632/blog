<div class="bloc-title">
    <div class="container">
        <h1>Mon profil</h1>
    </div>
</div>

<div class="container">
    <?php
        require_once 'model/user.php';
        require_once 'model/topic.php';

        $data = selectInfoUser();

        foreach ($data as $key => $value) {

            $name = $value['name'];
            $lastname = $value['lastname'];
            $pseudo = $value['pseudo'];
            $email = $value['email'];
            $created = $value['created'];
            $updated = $value['updated'];
            $type = $value['type'];

            ?>
            <div class="profile">
                <div class="profile__avatar">
                    <img src="images/camera.svg" alt="camera" class="profile__avatar__inner">
                </div>
                <div class="profile__title"><span>Bonjour</span><i><?php echo $name; ?></i> !</div>

                <h2 class="profile__infos">Mes informations</h2>

                <ul class="profile__list">
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre prénom : </span><span class="profile__list__item__rep"><?php echo $name; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre nom : </span><span class="profile__list__item__rep"><?php echo $lastname; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre nom d'utilisateur : </span><span class="profile__list__item__rep"><?php echo $pseudo; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Votre email : </span><span class="profile__list__item__rep"><?php echo $email; ?></span></li>
                </ul>
                <ul class="profile__list">
                    <li class="profile__list__item"><span class="profile__list__item__span">Compte crée le : </span><span class="profile__list__item__rep"><?php echo $created; ?></span></li>
                    <li class="profile__list__item"><span class="profile__list__item__span">Dernière mise à jour le : </span><span class="profile__list__item__rep"><?php echo $updated; ?></span></li>
                </ul>
                <a href="?action=updateProfile" class="inline-b link link--bg">Modifier mes informations personnelles</a>

                <?php if($type != 0) { ?>
                    <h2 class="profile__infos">Mes articles</h2>

                    <table class="article-listing">
                        <tr>
                            <th>Numéro</th>
                            <th>Titre</th>
                            <th>Date de création</th>
                            <th>Date de MàJ</th>
                            <th>Edit.</th>
                            <th>Supp.</th>
                        </tr>
                        <?php
                        $i = 1;
                        $data2 = selectInfoBilletsOfUser();
                        foreach ($data2 as $key2 => $value2) {
                            $id_billet = $value2['id_billet'];
                            $title = $value2['title'];
                            $date_c = $value2['created'];
                            $date_u = $value2['updated'];

                            $date_created = substr($date_c, 8, 2).'-'.substr($date_c, 5, 2).'-'.substr($date_c, 0, 4);
                            $time_created = substr($date_c, 10, 9);

                            $date_updated = substr($date_u, 8, 2).'-'.substr($date_u, 5, 2).'-'.substr($date_u, 0, 4);
                            $time_updated = substr($date_u, 10, 9);
                        ?>
                        <tr>
                            <td class="article-listing__num"><?php echo $i; ?></td>
                            <td class="article-listing__title"><?php echo '<a href="?action=topic&id_billet=' . $id_billet . '">'.$title.'</a>'; ?></td>
                            <td class="article-listing__date"><?php echo 'Le '.$date_created.' à '.$time_created; ?></td>
                            <td class="article-listing__date"><?php echo 'Le '.$date_updated.' à '.$time_updated; ?></td>
                            <td class="article-listing__edit"><a href="?action=update&id_billet=<?php echo $id_billet; ?>"><img src="images/edit.svg" class="icon" alt=""></a></td>
                            <td class="article-listing__delete"><a href="?action=deleteTopic&controler=topic&id_billet=<?php echo $id_billet; ?>"><img src="images/delete.svg" class="icon" alt=""></a></td>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
            <?php

        }
    ?>
</div>