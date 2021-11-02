<?php
    require_once 'Bdd.php';
    class Annonces extends Bdd{
        function __construct($valeur)
        {
            $this->idAnnonce = $valeur["id_annonce"];
            $this->titre = $valeur["titre_annonce"];
            $this->categorie = $valeur["id_categorie"];
            $this->description = $valeur["description_annonce"];
            $this->prix = $valeur["prix_annonce"];
            $this->localisation = $valeur["localisation_annonce"];
            $this->idUtilisateur = $valeur["id_utilisateur"];
        }  
    }
?>