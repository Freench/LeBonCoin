<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Informatique extends Annonces{
        function __construct($idInformatique, $etat, $idAnnonce)
        {
            $this->idInformatique = $idInformatique;
            $this->etat = $etat;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>