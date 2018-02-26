// le javascript //
$(document).ready(function() {

    $('.titre_index').click(function(){
        var str_titre = $('h2').attr('data-id');
        console.log(str_titre);
        var id = str_titre.substr(8,9);
        $('#main').load("article.php", "id="+id);
    });

    $('.categorie').click(function(){
        var str_cat = $('h4').attr('data-id');
        console.log(str_cat);
        var id = str_cat.substr(10,11);
        $('#main').load("categories.php", "id="+id);
    });

    $('.auteur').click(function(){
        var str_aut = $('.auteur').attr('id');
        console.log(str_aut);
        var id = str_aut.substr(7,8);
        $('#main').load("auteur.php", "id="+id);
    });

    $('#btnsearch').click(function(){
        var mot_cle = $('#inputsearch').val();
        console.log(mot_cle);
        $('#main').load("search.php", mot_cle)
    });

});
