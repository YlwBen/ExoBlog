<div id="banniere" class="test centre">Mini Blog de Flo, Ben et Greg</div>

<div id="menu" class="nav navbar-light">
  <!-- debut modal -->
    <div class="w3-container">
       <button onclick="document.getElementById('id01').style.display='block'" class="boutton_index">Nouvel article
       </button>
       <div id="id01" class="w3-modal">
           <div class="w3-modal-content">
               <div class="w3-container centre">
                   <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;
                   </span>
                   <form action="form.php" method="post" enctype="multipart/form-data">
                       <textarea name="auteur" class="pseudo" type="text" placeholder="Pseudo">
                       </textarea>
                       <textarea name="mail" class="mail" type="mail" placeholder="Mail">
                       </textarea>
                       <textarea name="titre" class="titre" type="text" placeholder="Titre Article">
                       </textarea>
                       <textarea name="contenu" class="article" type="text" placeholder="Article">
                       </textarea>
                       <div>
                         <!-- choix categorie -->
                           <select name="categorie" class="custom-select">
                              <?php $list_cat = list_cat($bdd);
                              while($donnees = mysqli_fetch_assoc($list_cat)) {
                              ?>
                              <option value="
                                  <?php echo $donnees['id']
                                  ?>">
                                  <?php echo $donnees['nom']
                                  ?>
                              </option>
                              <?php }
                              ?>
                           </select>
                       </div>
                       <input type="file" name="img">
                       <button type="submit" class="bouton" name="button">Publier
                       </button>
                   </form>
               </div>
           </div>
       </div>
    </div>
  <!-- fin modal -->
  <!-- tri par categorie -->
    <div class="dropdown">
       <button class="boutton_index dropdown-toggle" type="button" id="dropdowncat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Catégories
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdowncat">
           <?php $list_cat = list_cat($bdd);
              while($donnees = mysqli_fetch_assoc($list_cat)) {
            ?>
           <a class="dropdown-item" href="categories.php?id=
              <?php echo $donnees['id']
              ?>">
              <?php echo $donnees['nom']
              ?>
           </a>
           <?php }
           ?>
       </div>
    </div>
    <!-- tri par auteur -->
    <div class="dropdown">
       <button class="boutton_index dropdown-toggle" type="button" id="dropdownauth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Auteurs
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdownauth">

       <?php $list_auth = list_auth($bdd);
       while($data = mysqli_fetch_assoc($list_auth)) { ?>
       <a id="dropdownlistauth" class="dropdown-item" href="auteur.php?id=<?php echo $data['id']?>"><?php echo $data['nom']?></a>
       <?php } ?>

          <?php $list_auth = list_auth($bdd);
           while($data = mysqli_fetch_assoc($list_auth)) {
          ?>
         <a class="dropdown-item" href="auteur.php?id=
             <?php echo $data['id']
             ?>">
             <?php echo $data['nom']
             ?>
         </a>
         <?php }
         ?>

       </div>
    </div>
    <div>
      <!-- recherche personaliser -->
        <form action="search.php" method="post">

            <input type="text" name="search" id="inputsearch" placeholder="Rechercher">
            <span class="boutton_index" id="btnsearch">Go</span>

            </button>

        </form>
    </div>
</div>
