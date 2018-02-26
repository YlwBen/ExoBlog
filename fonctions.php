<?php

include 'connexion_sql.php';
// limitation de la page a 10 articles
function all($bdd) {
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limit = 10;
    $debut = ($page - 1) * $limit;
    $all = mysqli_query($bdd, "SELECT *
     FROM articles
     INNER JOIN categories ON categories.id = articles.id_categorie
     ORDER BY id_article DESC
     LIMIT $limit OFFSET $debut ");
     if (! $all) {
         echo mysqli_error($bdd);
     } else {
         return($all);
     }
}
// recuperations des differentes valeurs dans la bdd
function list_cat($bdd) {
    $list_cat = mysqli_query($bdd, 'SELECT *
    FROM categories');
    if (! $list_cat) {
        echo mysqli_error($bdd);
    } else {
    return($list_cat);
    }
}

function list_auth($bdd) {
    $list_auth = mysqli_query($bdd, 'SELECT *
    FROM auteurs');
    if (! $list_auth){
        echo mysqli_error($bdd);
    } else {
    return($list_auth);
    }
}

// Fonctions pour page ARTICLE (ajout des differentes valeurs)/////////////// BENJAMIN //////////////
function article($bdd, $id_article){
    $art = mysqli_query($bdd, "SELECT * FROM articles
    WHERE articles.id_article='".$id_article."'");
    if (! $art) {
        echo mysqli_error($bdd);
    } else {
    return($art);
    }
}

function categorie($bdd, $id_article){
    $cat = mysqli_query($bdd, "SELECT * FROM categories
    INNER JOIN articles ON categories.id=articles.id_categorie
    WHERE articles.id_article='".$id_article."'");
    if (! $cat) {
        echo mysqli_error($bdd);
    } else {
    return($cat);
    }
}

function auteur($bdd, $id_article){
    $aut = mysqli_query($bdd, "SELECT * FROM auteurs
    INNER JOIN articles ON auteurs.id=articles.id_auteur
    WHERE articles.id_article='".$id_article."'");
    if (! $aut) {
        echo mysqli_error($bdd);
    } else {
    return($aut);
    }
}
// FIN PAGE ARTICLE DE BEN !


function articles_categorie($bdd, $id_categories){
    $artcat = mysqli_query($bdd, "SELECT * FROM articles
    INNER JOIN categories ON categories.id=articles.id_categorie
    WHERE articles.id_categorie='".$id_categories."'");
    if (! $artcat) {
        echo mysqli_error($bdd);
    } else {
        return($artcat);
    }
}

function articles_auteur($bdd, $id_auteur){
    $artaut = mysqli_query($bdd, "SELECT * FROM articles
    INNER JOIN auteurs ON auteurs.id=articles.id_auteur
    WHERE articles.id_auteur='".$id_auteur."'");
    return($artaut);
}


// fonction qui permet de rajouter l'auteur
function ajout_auteur($bdd) {
   $nom = $_POST['auteur'];
   $mail = $_POST['mail'];
   $new_auteur = mysqli_query($bdd,
   "INSERT INTO auteurs (nom, mail)
   VALUES ('$nom', '$mail')");
}

// fonction qui permet de rajouter l'article
function ajout_article($bdd, $target_file) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $mail = $_POST['mail'];
    $categorie = $_POST['categorie'];
    $image = $target_file;
    $id_new_auteur = mysqli_query($bdd,
    "SELECT id
    FROM auteurs
    WHERE mail = '".$mail."'");
    $id = mysqli_fetch_assoc($id_new_auteur);
    $insert_article = mysqli_query($bdd,
    "INSERT INTO articles (titre, contenu, image, id_categorie, id_auteur)
    VALUES ('$titre', '$contenu', '$image', '$categorie', '".$id['id']."')");
    if (! $insert_article)
    {
        echo mysqli_error($bdd);
    }
}
// fonction qui permet d'afficher le(s) article(s) comportant le(s) mot(s) recherche
function recherche($bdd, $mot_cle) {
    $search = $mot_cle;
    $result = mysqli_query($bdd,
    "SELECT *
    FROM articles
    WHERE titre LIKE '%$search%' OR contenu LIKE '%$search%'");
    if (! $result)
    {
      echo mysqli_error($bdd);
    } else
    {
     return($result);
    }
}



?>
