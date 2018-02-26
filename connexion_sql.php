<?php
//connexion a la base de donnees
function connect(){
    $bdd = mysqli_connect('localhost', 'root', 'admin', 'exoBlog');

    if(!$bdd) {
    echo 'Erreur' ;
    die('Il y a pas de co avec la bdd'); // On affiche un message d'erreur.
    }

    mysqli_set_charset($bdd, 'utf8');
    return($bdd);
    }

?>
