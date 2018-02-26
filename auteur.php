<?php include 'fonctions.php' ?>

    <?php
      $id_auteur = $_GET['id'];
      $bdd = connect();
      $artaut = articles_auteur($bdd, $id_auteur);
      while ($donnees = mysqli_fetch_assoc($artaut)){
    ?>
    <!-- Permet l'affichage du titre sur la page. -->
    <a href="article.php?id=
      <?php echo $donnees['id_article']
      ?>">
      <h2 class="titre_index center">
        <?php echo $donnees['titre'];
        ?>
      </h2>
    </a>
    <!-- Permet l'affichage des images sur la page. -->
    <div class="center">
      <span>
         <img class="img-fluid" src="
           <?php echo $donnees['image'];
           ?>
          "/>
      </span>
    </div>
    </br>
    <!-- Permet l'affichage et la reduction des articles a 255 caracteres -->
    <div class="extrait test center">
      <?php echo substr($donnees['contenu'], 0, 255)."..."
      ?>
    </div>
    <!-- Permet l'affichage de la date sur la page. -->
    <div class="date center">
      <?php echo $donnees['date'];
      ?>
    </div>
   <?php
         }
    ?>
    <!-- BOUTON RETOUR ACCEUIL -->
  <div class="center">
    <div class="btn boutton_index">
        <a href="index.php" style ="text-decoration:none">Retour
        </a>
    </div>
  </div>

<?php include 'footer.php'
?>
