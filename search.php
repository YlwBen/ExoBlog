
<?php include 'fonctions.php' ?>

    <?php
    $mot_cle = $_POST['search'];
    $bdd = connect();
    $result = recherche($bdd, $mot_cle);
    while ($donnees = mysqli_fetch_assoc($result))
    { ?>
      <a href="article.php?id=<?php echo $donnees['id_article']?>"><h2 class="center titre_index"><?php echo $donnees['titre'];?></h2></a>
      </br>
}

<!-- Permet la recherche. -->
<div class="container">
    <?php
      $mot_cle = $_POST['search'];
      $bdd = connect();
      $result = recherche($bdd, $mot_cle);
      while ($donnees = mysqli_fetch_assoc($result){
    ?>
    <!-- Permet l'affichage de l'article sur la page. -->
    <h2>
      <a href="article.php?id=
        <?php echo $donnees['id_article']
        ?>">
        <!-- Permet l'affichage du titre sur la page. -->
        <h2 class="center titre_index">
          <?php echo $donnees['titre'];
          ?>
        </h2>
      </a>
    </h2>
    </br>
    <!-- Permet l'affichage des images sur la page. -->

    <div class="center">
      <span>
          <img class="img-fluid" src="
          <?php echo $donnees['image'];
          ?>"/>
      </span>
    </div>
    </br>
    <!-- Permet la reduction des articles a 255 caracteres -->
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
            <a href="index.php" style ="text-decoration:none">Retour</a>
        </div>
       </div>
