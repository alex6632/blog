<?php
require_once 'model/user.php';
require_once 'model/topic.php';
require_once 'model/category.php';

if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 2) {
$data = selectInfoUser();
foreach ($data as $key => $value) {
    $name = $value['name'];
?>
    <div class="bloc-title">
        <div class="container">
            <h1>Bonjour <?php echo htmlspecialchars($name); ?></h1>
        </div>
    </div>
<?php
}
?>

<div class="container">
    <div class="dashboard">
        <!-- ************************************************************** -->
        <h2 class="dashboard__title">Liste des utilisateurs</h2>
        <table class="article-listing">
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Type</th>
                <th>Validité</th>
                <th>Date d'entrée</th>
                <th>Nb Art.</th>
                <th>Nb Com.</th>
                <th>/!\</th>
            </tr>
            <?php
            $data = selectInfoAllUser();
            foreach ($data as $key => $value) {
                $id_user = $value['id_user'];
                $name = $value['name'];
                $lastname = $value['lastname'];
                $pseudo = $value['pseudo'];
                $email = $value['email'];
                $type = $value['type'];
                $isCheck = $value['account_check'];
                $created = $value['created'];
                $date_created = substr($created, 8, 2).'-'.substr($created, 5, 2).'-'.substr($created, 0, 4);

                if($isCheck == 0) {
                    $check = 'En attente';
                } else if($isCheck == 2) {
                    $check = 'Non';
                } else {
                    $check = 'Oui';
                }

                if($type == 0) {
                    $typeName = "Membre";
                } else if($type == 1) {
                    $typeName = "Blogger";
                } else if($type == 3) {
                    $typeName = "En attente";
                } else {
                    $typeName = "Admin";
                }
            ?>
                <tr>
                    <td class=""><?php echo htmlspecialchars($name); ?></td>
                    <td class=""><?php echo htmlspecialchars($lastname); ?></td>
                    <td class=""><?php echo htmlspecialchars($pseudo); ?></td>
                    <td class=""><?php echo htmlspecialchars($email); ?></td>
                    <td class="">
                        <?php
                        if($type == 3) {
                            echo 'Blogger ?<br>';
                        ?>
                            <a href="?action=bloggerAccepted&controler=user&id_user=<?php echo $id_user; ?>">Oui</a> |
                            <a href="?action=bloggerNotAccepted&controler=user&id_user=<?php echo $id_user; ?>">Non</a>
                        <?php
                        } else {
                            echo $typeName.'<br>';
                        }
                        ?>
                    </td>
                    <td class="">
                        <?php
                        if($isCheck == 0) {
                            ?>
                            <a href="?action=accountAccepted&controler=user&id_user=<?php echo $id_user; ?>">Oui</a> |
                            <a href="?action=accountNotAccepted&controler=user&id_user=<?php echo $id_user; ?>">Non</a>
                            <?php
                        } else {
                            echo $check;
                        }
                        ?>
                    </td>
                    <td class=""><?php echo 'Le '.$date_created; ?></td>
                    <td class=""><?php echo "NB"; ?></td>
                    <td class=""><?php echo "NB"; ?></td>
                    <td class=""><a href="?action=deleteUser&controler=user&id_user=<?php echo $id_user; ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!-- ************************************************************** -->
        <h2 class="dashboard__title">Liste des articles</h2>
        <table class="article-listing">
            <tr>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Date de création</th>
                <th>Date de MàJ</th>
                <th>Auteur</th>
                <th>Supp.</th>
            </tr>
            <?php
            $i = 1;
            $data2 = selectInfoAllBillet();
            foreach ($data2 as $key2 => $value2) {
                $id_billet = $value2['id_billet'];
                $title = $value2['title'];
                $date_c = $value2['created'];
                $date_u = $value2['updated'];
                $id_categorie = $value2['id_category'];
                $id_author = $value2['id_user'];

                $date_created = substr($date_c, 8, 2).'-'.substr($date_c, 5, 2).'-'.substr($date_c, 0, 4);
                $time_created = substr($date_c, 10, 9);

                $date_updated = substr($date_u, 8, 2).'-'.substr($date_u, 5, 2).'-'.substr($date_u, 0, 4);
                $time_updated = substr($date_u, 10, 9);

                $data3 = selectCategory();
                foreach ($data3 as $key3 => $value3) {
                    $cat = $value3['name'];

                    $data4 = selectAuthorOfTopic($id_author);
                    foreach ($data4 as $key4 => $value4) {
                        $author = $value4['pseudo'];


                ?>
                <tr>
                    <td class=""><?php echo $i; ?></td>
                    <td class=""><?php echo '<a href="index.php?action=topic&id_billet=' . $id_billet . '" target="_blank">'.htmlspecialchars($title).'</a>'; ?></td>
                    <td class=""><?php echo $cat; ?></td>
                    <td class=""><?php echo 'Le '.$date_created.' à '.$time_created; ?></td>
                    <td class=""><?php echo 'Le '.$date_updated.' à '.$time_updated; ?></td>
                    <td class=""><?php echo htmlspecialchars($author); ?></td>
                    <td class=""><a href="?action=deleteTopic&controler=topic&id_billet=<?php echo $id_billet; ?>">Supprimer</a></td>
                </tr>
                <?php $i++; ?>
            <?php
                    }
                }
            }
            ?>
        </table>
        <!-- ************************************************************** -->
        <h2 class="dashboard__title">Liste des catégories</h2>
        <table class="article-listing">
            <tr>
                <th>Nom</th>
                <th>image</th>
                <th>Editer</th>
                <th>Supprimmer</th>
            </tr>
            <?php
                $data = selectCategory();
                foreach ($data as $key => $value) {
                    $cat = $value['name'];
                    $imgCat = $value['image'];
            ?>
                    <tr>
                        <td class=""><?php echo $cat; ?></td>
                        <td class="img-cat"><img src="images/<?php echo $imgCat; ?>-mini.jpg" alt=""></td>
                        <td class=""><a href="?action=deleteTopic&controler=topic&id_billet=<?php echo $id_billet; ?>">Editer</a></td>
                        <td class=""><a href="?action=deleteTopic&controler=topic&id_billet=<?php echo $id_billet; ?>">Supprimer</a></td>
                    </tr>
                    <?php $i++; ?>
            <?php
                }
            ?>
        </table>
        <!-- ************************************************************** -->
    </div>
</div>

<?php
} else {
    header('Location: admin.php?action=admin-login');
}
?>