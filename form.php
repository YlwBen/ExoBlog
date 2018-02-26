<?php
include 'fonctions.php';
//traiter le formulaire + ajout images
if (isset($_POST) AND !empty($_POST)){
    $bdd = connect();
    ajout_auteur($bdd);
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    ajout_article($bdd, $target_file);
    header("Location: index.php");

} else
{
    echo 'Erreur';
}

?>
