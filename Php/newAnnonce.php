<?php session_start();
include 'header.php';
include 'nav.php';
require_once '../Class/Bdd.php';
require_once '../Class/ControleurAnnonces.php';

if (!isset($_SESSION['connected'])) {
    header('Location: ../SignInLogIn/login.php');
}
?>

<div class="container">
    <div class="boxRecherche">
        <form action="" method="POST" enctype="multipart/form-data" class="d-flex boxForm">
                <input type="text"  name="titreAnnonce" placeholder="Titre de l'annonce" required>
                <input type="number"  name="prixAnnonce" placeholder="Prix de l'article" required>
                <input type="file" name="photoAnnonce" accept=".png,.pdf,.jpg" placeholder="Photo de l'annonce" size=50 required>
                <input type="text" name="localisationAnnonce" placeholder="Localisation" required>
                <input type="text" name="descriptionAnnonce" placeholder="Description" required>
                <div id="categorie"></div>
                <div id="specificites-section"></div>
                <!-- <input type="number" name="categorieAnnonce" placeholder="Categorie" required> -->
                <!-- <input type="submit" name="submit" value="OK"> -->
                <div id="btEnvoie">
                    <button class="btn btn-primary" type="submit" name="submit">OK</button>
                </div>
        </form>
    </div>
</div>

<script type="module" src="../Js/script.js"></script>


    <?php
    if(isset($_GET['submit'])){
        $controleur = new ControleurAnnonces();
    }
    ?>
<?php
    include('footer.php');
?>
