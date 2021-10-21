<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once("ControleurAnnonces.php");
        require_once("ControleurUtilisateurs.php");
        // $controleurUtilisateur = new ControleurUtilisateurs();
        // $controleurUtilisateur->insert(["a", "a", 2]);

        $controleurAnnonces = new ControleurAnnonces();
        $id_annonce = $controleurAnnonces->insert(["a", "a","a",10,"a", 1]);
        $id_annonce =intval( $id_annonce);
    ?>
    <div>
        <form action="" method="get">
            <input type="text" placeholder="Titre de l'annonce" value="" name="titre-annonce">
            <input type="text" placeholder="Descritpion" value="" name="description">
            <input type="integer" placeholder="Prix" value="" name="prix">
            <input type="text" placeholder="Adresse" value="" name="adresse">

            <input list="categorie-principal" id="categorie" name="categorie" />
            <datalist id="categorie-principal">
                <option value="Immobilier">
                <option value="Voiture">
                <option value="Multimedia">
            </datalist>
            <div id="categorie-selecteur">
                <div id="voiture-form" class="display-none">
                    <input type="text" placeholder="Titre de l'annonce" value="" name="titre-annonce">
                    <input type="text" placeholder="Descritpion" value="" name="description">
                    <input type="integer" placeholder="Prix" value="" name="prix">
                </div>
                <div id="immobilier-form" class="display-none">
                    <input type="text" placeholder="Titre de l'annonce" value="" name="titre-annonce">
                    <input type="text" placeholder="Descritpion" value="" name="description">
                    <input type="integer" placeholder="Prix" value="" name="prix">
                </div>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>