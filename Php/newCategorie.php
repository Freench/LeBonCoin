<?php
include 'header.php';
include 'nav.php';
    /*Si le formulaire à déjà été rempli, on créé un objet ControleurCategorie qui va vérifier et créer les enregistrements dans catégorie
     et dans donnesspecifiques*/
    require_once('ControleurCategories.php');
    if(isset($_GET["new-categorie"])){
        new ControleurCategories();
    }
?>

<!-- Formulaire pour ajouter une categorie -->
<form method = "get" action="" id="add-categorie">
    <span>Nouvelle catégorie :</span> <input type="text" placeholder="Nouvelle Catégorie" value="" name="nom-categorie"> </br>
    <span>Données Spécifiques à la catégorie :</span> </br>
    <!-- Les lignes du formulaire est généré par newCategorie.js avec le btn-new-line. -->
</form>
<button id=btn-new-line>Nouveau critère</button>
<input type="submit" value="Valider" name="new-categorie" form="add-categorie">


<script src="newCategorie.js"></script>

<?php include 'footer.php'; ?>
