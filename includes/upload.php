<?php

// UPLOADER UNE PHOTO
$maxsize = 10000000;

if ($_FILES['icone']['error'] > 0)
    $erreur = "Erreur lors du transfert";

if ($_FILES['icone']['size'] > $maxsize)
    $erreur = "Le fichier est trop gros";

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( !in_array($extension_upload,$extensions_valides) )
    $erreur = "Extenssion incorrecte";

$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
    $erreur = "Image trop grande";

$char = "abcdefghijklmnopqrstuvwxyz0123456789";
$_FILES['icone']['name'] = str_shuffle($char);
$_SESSION["new-name"] = $_FILES['icone']['name'];
$_SESSION["new-name"] = $_SESSION["new-name"].".".$extension_upload;

$destination = "././images/photos/".$_SESSION["new-name"];

$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$destination);
if ($resultat) {
   // photos::insertPhoto();
   // membres::updateNbUpload($_SESSION["nb_up"]);
}

// MODIFICATION DES INFOS PROFIL
if(isset($_POST["modification"])) {

    $_SESSION["nom"] = $_POST["nom"];
    $_SESSION["prenom"] = $_POST["prenom"];
    $_SESSION["surnom"] = $_POST["surnom"];
    $_SESSION["histoire"] = addslashes($_POST["histoire"]);

    //membres::updateInfos();
}
