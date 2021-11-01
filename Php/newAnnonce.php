<?php
    // include('header.php');
    include('nav.php');
?>
<form action="" method="GET">
        <input type="text"  name="titreAnnonce" placeholder="Titre de l'annonce" required>
        <input type="number"  name="prixAnnonce" placeholder="Prix de l'article" required>
        <input type="text" name="photoAnnonce" placeholder="Photo de l'annonce" required>
        <input type="text" name="localisationAnnonce" placeholder="Localisation" required>
        <input type="text" name="descriptionAnnonce" placeholder="Description" required>
        <div id="categorie"></div>
        <div id="specificites-section"></div>
        <!-- <input type="number" name="categorieAnnonce" placeholder="Categorie" required> -->
        <input type="submit" name="submit" value="OK">
</form>

<script type="module" src="../Js/script.js"></script>


    <?php
    if(isset($_GET['submit'])){
        $controleur = new ControleurAnnonces();
    }
    ?>



<?php
    include('footer.php');
?>