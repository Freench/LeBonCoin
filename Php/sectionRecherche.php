<?php

    if(isset($_GET['submit'])){
        if($_GET['submit'] == 'rechercher'){
            $controleur = new ControleurAnnonces();
            $resultat = $controleur->recherche($_GET['categorie'], $_GET['text-recherche'], $_GET['localisation-recherche']);
            var_dump($resultat) ;
        }
    }

?>
<form>
    <div class="col section-recherche">


        <legend>Rechercher une annonce </legend>
        <div class = "row justify-content-center">
            <div class="col-3">
                <label for="categorie" class="form-label">Catégorie :</label>
                <div id="categorie"></div>
            </div>
            <div class="col-3">
            <label for="text-recherche" class="form-label">Que recherchez-vous ?</label>
            <input type="text" class="form-control" id="text-recherche" placeholder="Que recherchez-vous ?" name="text-recherche">
            </div>
            <div class="col-3">
                <label for="localisation-recherche" class="form-label">Où cherchez-vous ?</label>
                <input type="text" class="form-control" id="localisation-recherche" placeholder="Saisissez une ville" name="localisation-recherche">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" value="rechercher">Rechercher</button>
    </div>
</form>
<script src="Js/selecteurCategorie.js"></script>