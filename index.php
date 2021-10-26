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

        // $controleurAnnonces = new ControleurAnnonces();
        // $id_annonce = $controleurAnnonces->insert(["a","a","a",10,"a",1]);
        // $id_annonce =intval( $id_annonce);
    ?>
    <div>
        <form action="" method="get" id ="recherche_form">
            <input type="text" placeholder="Titre de l'annonce" value="" name="titre-annonce">
            <input type="text" placeholder="Descritpion" value="" name="description">
            <input type="number" placeholder="Prix" value="" name="prix">
            <input type="text" placeholder="Adresse" value="" name="adresse">
            <select id="categorie" name="categorie">
                <option value="immobilier">Immobilier</option>
                <option value="voiture">Voiture</option>
                <option value="multimedia">Multimédia</option>
            </select>
            <div id="categorie-section">
                <div class="display-none">
                    <p>Immobilier</p>
                    <select id="typedebien" name="typedebien">
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                    </select>
                    <input type="number" placeholder="Surface" value="" name="surface">
                    <input type="number" placeholder="Nombre de pièce" value="" name="pieces">
                </div>
                <div class="display-none">
                    <p>Voiture</p>
                    <input type="text" placeholder="Marque" value="" name="marque">
                    <input type="text" placeholder="Modèle" value="" name="modele">
                    <input type="number" placeholder="Kilométrage" value="" name="kilométrage">
                    <select id="carburant" name="carburant">
                        <option value="essence">Essence</option>
                        <option value="diesel">Diesel</option>
                        <option value="electrique">Électrique</option>
                    </select>
                    <select id="btvitesse" name="btvitesse">
                        <option value="manuelle">Manuelle</option>
                        <option value="automatique">Automatique</option>
                    </select>
                    <input type="text" placeholder="Couleur" value="" name="couleur">
                    <input type="number" placeholder="Nombre de porte" value="" name="nbporte">
                    <input type="number" placeholder="Puissance" value="" name="puissance">
                    <input type="number" placeholder="Nombre de place" value="" name="nbplace">
                </div>
                <div class="display-none">
                    <p>Multimedia</p>
                    <select id="categorie2" name="categorie2">
                        <option value="3">Informatique</option>
                        <option value="4">Console et jeux vidéo</option>
                        <option value="5">Téléphonie</option>
                    </select>
                </div>
                <div class="display-none">
                    <p>Informatique</p>
                    <select id="Etat" name="etat">
                        <option value="neuf">État Neuf</option>
                        <option value="tres-bon">Très bon état</option>
                        <option value="bon">Bon état</option>
                        <option value="satisfaisant">État satisfaisant</option>
                        <option value="pour-piece">Pour pièce</option>
                    </select>
                </div>
                <div class="display-none">
                    <p>Console et Jeux vidéo</p>
                    <select id="type" name="type">
                        <option value="console">Console</option>
                        <option value="jeux">Jeux</option>
                        <option value="accessoires">Accessoires</option>
                    </select>
                    <input type="text" placeholder="Marque" value="" name="marque">
                    <input type="text" placeholder="Modèle" value="" name="modele">
                    <select id="Etat" name="etat">
                        <option value="neuf">État Neuf</option>
                        <option value="tres-bon">Très bon état</option>
                        <option value="bon">Bon état</option>
                        <option value="satisfaisant">État satisfaisant</option>
                        <option value="pour-piece">Pour pièce</option>
                    </select>
                </div>
                <div class="display-none">
                    <p>Téléphonie</p>
                    <input type="text" placeholder="Marque" value="" name="marque">
                    <input type="text" placeholder="Modèle" value="" name="modele">
                    <input type="text" placeholder="Couleur" value="" name="couleur">
                    <input type="number" placeholder="Capacité de stockage" value="" name="stockage">
                    <select id="Etat" name="etat">
                        <option value="neuf">État Neuf</option>
                        <option value="tres-bon">Très bon état</option>
                        <option value="bon">Bon état</option>
                        <option value="satisfaisant">État satisfaisant</option>
                        <option value="pour-piece">Pour pièce</option>
                    </select>
                </div>
            </div>
            <input type="submit"  value="Poster l'annonce" name="">
        </form>
    </div>
    
    <script src="script.js"></script>
</body>
</html>