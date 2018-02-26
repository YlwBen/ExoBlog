<?php include 'fonctions.php' ?>

    <?php
    $id_categories = $_GET['id'];
    $bdd = connect();
    $artcat = articles_categorie($bdd, $id_categories) ?>
    <?php while ($donnees = mysqli_fetch_assoc($artcat))
    { ?>
      <!-- Permet l'affichage du titre sur la page categorie. -->
      <h2>
        <a href="article.php?id=
           <?php echo $donnees['id_article']
           ?>">
           <h2 class="center titre_index">
             <?php echo $donnees['titre'];
             ?>
           </h2>
        </a>
      </h2>
      </br>
      <!-- Permet l'affichage des images sur la page categorie. -->
    <div class="center">
      <span>
      <img class="img-fluid" src="
        <?php echo $donnees['image'];
        ?>"
      />
      </span>
    </div>
    </br>
    <!-- Permet la reduction des articles a 255 caracteres -->
      <div class="extrait test center">
         <?php echo substr($donnees['contenu'], 0, 255)."..."
         ?>
      </div>
      <!-- Permet l'affichage de la date sur la page categorie. -->
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
