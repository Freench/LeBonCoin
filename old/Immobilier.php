<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Immobilier extends Annonces{
        function __construct($idImmobilier, $type, $surface, $nbPieces, $idAnnonce)
        {
            $this->idImmobilier = $idImmobilier;
            $this->type = $type;
            $this->surface = $surface;
            $this->nbPieces = $nbPieces;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>