<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Voiture extends Annonces{
        function __construct($idVoiture, $marque, $model, $kilometrage, $carburant, $btVitesse, $couleur, $nbPorte, $puissance, $nbPlace, $idAnnonce)
        {
            $this->idVoiture = $idVoiture;
            $this->marque = $marque;
            $this->model = $model;
            $this->kilometrage = $kilometrage;
            $this->carburant = $carburant;
            $this->btVitesse = $btVitesse;
            $this->couleur = $couleur;
            $this->nbPorte = $nbPorte;
            $this->puissance = $puissance;
            $this->nbPlace = $nbPlace;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>