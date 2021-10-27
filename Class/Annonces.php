<?php
    require_once 'Bdd.php';
    class Annonces extends Bdd{
        function __construct($idAnnonce, $titre, $categorie, $description, $prix, $localisation, $idUtilisateur)
        {
            $this->idAnnonce = $idAnnonce;
            $this->titre = $titre;
            $this->categorie = $categorie;
            $this->description = $description;
            $this->prix = $prix;
            $this->localisation = $localisation;
            $this->idUtilisateur = $idUtilisateur;
        }  
    }
?>