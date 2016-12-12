<?php

require_once 'model/category.php';
require_once 'model/topic.php';
require_once 'model/user.php';
require_once 'model/comment.php';

if(!empty($_GET['id_billet'])) {
    $id_billet = $_GET['id_billet'];
} else {
    $id_billet = $_SESSION['last_id_topic'];
}

$data = selectInfoBillet($id_billet);
foreach ($data as $key => $value) {
    $id_billet = $value['id_billet'];
    $title = $value['title'];
    $content = $value['content'];
    $created = $value['created'];
    $updated = $value['updated'];
    $id_author = $value['id_user'];
    $id_category = $value['id_category'];

    $dataUser = selectAuthorOfTopic($id_author);
    foreach ($dataUser as $key2 => $value2) {
        $pseudo = $value2['pseudo'];

        $dataCategory = selectCategoryOfTopic($id_category);
        foreach ($dataCategory as $key3 => $value3) {

            $name_cat = $value3['name'];
            $img_cat = $value3['image'];

            $date_created = substr($created, 8, 2).'-'.substr($created, 5, 2).'-'.substr($created, 0, 4);
            $time_created = substr($created, 10, 9);

            $date_updated = substr($updated, 8, 2).'-'.substr($updated, 5, 2).'-'.substr($updated, 0, 4);
            $time_updated = substr($updated, 10, 9);

            $nbOfComments = selectNbOfCommentByTopic($id_billet);
            ?>
                <div class="topic">
                    <div class="topic__img">
                        <img src="images/<?php echo $img_cat; ?>.jpg" alt="">
                        <div class="topic__img__cat"><?php echo $name_cat; ?></div>
                    </div>
                    <div class="container">
                        <div class="topic__title"><?php echo $title; ?></div>
                        <div class="topic__infos">Rédigé le <?php echo $date_created; ?> à <?php echo $time_created; ?> | Par <?php echo $pseudo; ?></div>
                        <div class="topic__content"><?php echo $content; ?></div>
                        <?php if($created != $updated) { ?>
                            <div class="topic__infos topic__infos--update">Mis à jour le <?php echo $date_updated; ?> à <?php echo $time_updated; ?> | Par <?php echo $pseudo; ?></div>
                        <?php } ?>
                    </div>
                    <?php if(isset($_SESSION['user']['id_user']) && $id_author == $_SESSION['user']['id_user']) { ?>
                        <a href="?action=update&id_billet=<?php echo $id_billet; ?>" class="topic__edit"><img src="images/edit.svg" class="icon" alt=""></a>
                    <?php } ?>

                    <div class="comment-container">
                        <div class="container">
                            <h2>Commentaires (<?php echo $nbOfComments; ?>)</h2>
                            <form action="index.php?action=createComment&controler=comment&id_billet=<?php echo $id_billet; ?>" method="post" class="topic__form">
                                <textarea name="" id="" cols="1" rows="1" placeholder="Votre commentaire ici..."></textarea>
                                <input type="submit" value="Envoyer" class="button">
                            </form>
                        </div>
                        <?php

                        $dataComment = selectInfoCommentOfBillet($id_billet);
                        foreach ($dataComment as $key4 => $value4) {

                            $contentCom = $value4['content'];
                            $createdCom = $value4['created'];
                            $updatedCom = $value4['updated'];
                            $id_user = $value4['id_user'];
                            $authorCom = selectAuthorOfComment($id_user);

                            $date_created_com = substr($createdCom, 8, 2).'-'.substr($createdCom, 5, 2).'-'.substr($createdCom, 0, 4);
                            $time_created_com = substr($createdCom, 10, 9);
                            $date_updated_com = substr($updatedCom, 8, 2).'-'.substr($updatedCom, 5, 2).'-'.substr($updatedCom, 0, 4);
                            $time_updated_com = substr($updatedCom, 10, 9);

                        ?>
                        <div class="comment">
                            <div class="comment__avatar">
                                <div class="comment__avatar__circle">
                                    <img src="" alt="">
                                </div>
                            </div>
                            <div class="comment__right">
                                <span class="comment__right__name"><?php echo $authorCom; ?></span>
                                <span class="comment__right__date"><?php echo 'le '.$date_created_com.' à '.$time_created_com; ?></span>
                                <div class="comment__right__content"><?php echo $contentCom; ?></div>
                                <?php if($created != $updated) { ?>
                                    <div class="comment__right__updated">Mis à jour le <?php echo $date_updated_com; ?> à <?php echo $time_updated_com; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    }
        }
    }
}
?>

