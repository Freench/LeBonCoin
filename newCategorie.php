<?php
    var_dump($_GET["ordre"]) ;
    var_dump($_GET["donnee"]) ;
?>

<form method = "get" action="" id="add-categorie">
    <span>Nouvelle catégorie :</span> <input type="text" placeholder="Nouvelle Catégorie" value="" name="nom-categorie"> </br>
    <span>Données Spécifiques à la catégorie :</span> </br>
    <!-- <span>Numéro d'ordre :</span> <input type="number" placeholder="N°" value="" name="ordre-1">
    <span>Nom donnée :</span> <input type="text" placeholder="Nom critère" value="" name="donne-1"> -->
</form>
<button id=btn-new-line>Nouveau critère</button>
<input type="submit" value="Valider" name="new-categorie" form="add-categorie">


<script src="newCategorie.js"></script>
