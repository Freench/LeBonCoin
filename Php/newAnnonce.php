<?php session_start();
require_once '../Class/Bdd.php';
require_once '../Class/ControleurAnnonces.php';

if (!isset($_SESSION['connected'])) {
    header('Location: ../SignInLogIn/login.php');
}
?>


<form action="" method="POST" enctype="multipart/form-data">
        <input type="text"  name="titreAnnonce" placeholder="Titre de l'annonce" required>
        <input type="number"  name="prixAnnonce" placeholder="Prix de l'article" required>
        <input type="file" name="photoAnnonce" accept=".png,.pdf,.jpg" placeholder="Photo de l'annonce" size=50 required>
        <input type="text" name="localisationAnnonce" placeholder="Localisation" required>
        <input type="text" name="descriptionAnnonce" placeholder="Description" required>
        <input type="number" name="categorieAnnonce" placeholder="Categorie" required>
        <input type="submit" name="submit" value="OK">
</form>
<script src="Js/selecteurCategorie.js"></script>




<?php
if(isset($_POST['submit'])){
    $controleur = new ControleurAnnonces();
    
}
?>
