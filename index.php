<?php 
require_once 'Class/Controleur.php';

if (!isset($_SESSION['connected'])) {
    header('Location: SignInLogIn/login.php');
}
?>

<form action="SignInLogIn/logout.php" method="POST">
    <input type="submit" value="Déconnexion">
</form>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <form action="" method="GET">
        <input type="text"  name="titreAnnonce" placeholder="Titre de l'annonce" required>
        <input type="number"  name="prixAnnonce" placeholder="Prix de l'article" required>
        <input type="text" name="photoAnnonce" placeholder="Photo de l'annonce" required>
        <input type="text" name="localisationAnnonce" placeholder="Localisation" required>
        <input type="text" name="descriptionAnnonce" placeholder="Description" required>
        <input type="number" name="categorieAnnonce" placeholder="Categorie" required>
        <input type="submit" name="submit" value="OK">
    </form>

    <?php


    if(isset($_GET['submit'])){
        $controleur = new Controleur();
    }
    ?>
    
    </body>
</html>
