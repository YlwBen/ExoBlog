<?php include 'fonctions.php'
?>
    <?php
        $id_article = $_GET['id'];
        $bdd = connect();
        $art = article($bdd,$id_article);
        $cat = categorie($bdd, $id_article);
        $aut = auteur($bdd, $id_article);

        $donneesaut = mysqli_fetch_assoc($aut);
        $donneescat = mysqli_fetch_assoc($cat);
        $donnees = mysqli_fetch_assoc($art);
    ?>
    <!-- Permet l'affichage du titre sur la page. -->
    <h1 class="center titre_index">
      <?php echo $donnees['titre'];
      ?>
    </h1>
    <!-- Permet l'affichage des images sur la page. -->
    <div class="center">
       <img class="img-fluid" src="
         <?php echo $donnees['image'];
         ?>"
       />
    </div>
    <!-- Permet l'affichage des articles sur la page. -->
    <p class="test center">
      <?php echo $donnees['contenu'];
      ?>
    </p>
    <!-- Permet l'affichage des categories sur la page. -->
    <div class="categorie center">
      <?php echo 'Catégorie : '.$donneescat['nom'];
      ?>
    </div>
    <!-- Permet l'affichage des auteurs sur la page. -->
    <div class="auteur center" id="auteur_
      <?php echo $donneesaut['id'];
      ?>" class="auteur center">
      <?php echo 'Auteur : '.$donneesaut['nom'];
      ?>
    </div>

    <!-- BOUTON RETOUR ACCEUIL -->
    <div class="center">
      <div class="btn boutton_index">
        <a href="index.php" style ="text-decoration:none">Retour</a>
      </div>
    </div>
