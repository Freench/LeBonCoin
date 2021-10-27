<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Console extends Annonces{
        function __construct($idConsole, $marque, $modele, $couleur, $stockage, $etat, $idAnnonce)
        {
            $this->idConsole = $idConsole;
            $this->marque = $marque;
            $this->modele = $modele;
            $this->couleur = $couleur;
            $this->stockage = $stockage;
            $this->etat = $etat;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>