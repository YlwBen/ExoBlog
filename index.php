<?php include 'header.php' ?>

    <div class="container">
    <?php
    $bdd = connect();
    $page = $_GET['page'];
    ?>

    <?php include 'menu.php' ?>
<!-- Permet l'affichage des articles sur la page d'acceuil. -->
        <div id="main">
           <?php $result = all($bdd);
           ?>
           <div class="row">
              <?php
                 while($donnees = mysqli_fetch_assoc($result)) {
               ?>
              <!-- Permet l'affichage des images sur la page d'acceuil. -->
              <div class="col-12 col-md-4 col-lg-2">
                 <img id="imageUne" class="img-fluid img" src="<?php echo $donnees['image']?>"/>
              </div>
              <!-- Permet l'affichage des titres et images sur la page d'acceuil. -->
              <div class="col-12 col-md-8 col-lg-4 test">
                  <a href="article.php?id=<?php echo $donnees['id_article']?>"><h2 class="titre_index"><?php echo $donnees['titre'];?></h2></a>
                  <a href="categories.php?id=<?php echo $donnees['id_categorie']?>"><h4 class="categorie"><?php echo $donnees['nom'];?></h4></a>
                  <!-- Permet la reduction des articles a 255 caracteres -->
                  <div class="extrait">
                    <?php echo substr($donnees['contenu'], 0, 255)."..."?>
                  </div>
              </div>
               <?php } ?>
            </div>
        </div>
     <!-- Permet l'acces aux pages precedentes et suivantes. -->
        <div id="pagination">
            <?php
              if ($page != 1 && !empty($page)) {
            ?>
            <div class="center">
              <span id="precedent" class="test centre"><a href="index.php?page=<?php echo $page - 1; ?>">Page précédente</a></span>
              <span id="suivant" class="test centre"><a href="index.php?page=<?php echo $page + 1; ?>">Page suivante</a></span>
            </div>
            <?php } else {
            ?>
            <div class="center">
              <span id="suivant" class="test centre"><a href="index.php?page=<?php echo $page + 1; ?>">Page suivante</a></span>
            </div>
            <?php }
            ?>
        </div>


<?php include 'footer.php' ?>
