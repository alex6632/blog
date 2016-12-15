<div class="home">
    <div class="container">
        <h2 class="h2">Les derniers articles</h2>

        <ul class="list">
            <?php
            // Boucle affichant les derniers articles - trier par date - les 10 derniers par exemple

            require_once 'model/category.php';
            require_once 'model/topic.php';
            require_once 'model/user.php';

            $data = selectInfoLastBillet();
            foreach ($data as $key => $value) {
                $id_billet = $value['id_billet'];
                $title = $value['title'];
                $created = $value['created'];
                $id_author = $value['id_user'];
                $id_category = $value['id_category'];

                $date_created = substr($created, 8, 2).'-'.substr($created, 5, 2).'-'.substr($created, 0, 4);
                $time_created = substr($created, 10, 9);

                $dataUser = selectAuthorOfTopic($id_author);
                foreach ($dataUser as $key2 => $value2) {
                    $pseudo = $value2['pseudo'];

                    $dataCategory = selectCategoryOfTopic($id_category);
                    foreach ($dataCategory as $key3 => $value3) {

                        $name_cat = $value3['name'];
                        $img_cat = $value3['image'];

                        echo '<li class="list__item">';
                            echo '<a class="list__item__img" href="?action=topic&id_billet=' . $id_billet . '"><img src="images/'.$img_cat.'-mini.jpg" alt="Image de la catégorie"></a>';
                            echo '<div class="list__item__cat">'.$name_cat.'</div>';

                        echo '<a href="?action=topic&id_billet=' . $id_billet . '">';
                            echo '<div class="list__item__title">'.htmlspecialchars($title).'</div>';
                            echo "<div class=\"list__item__footer\">Rédigé le ".$date_created." à ".$time_created." | Par ".htmlspecialchars($pseudo)."</div>";
                        echo '</a>';

                        echo '</li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>