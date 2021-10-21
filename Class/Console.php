<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Console extends Annonces{
        function __construct($idConsole, $type, $marque, $modele, $etat, $idAnnonce)
        {
            $this->idConsole = $idConsole;
            $this->type = $type;
            $this->marque = $marque;
            $this->modele = $modele;
            $this->etat = $etat;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>