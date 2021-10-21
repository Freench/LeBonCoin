<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class Utilisateurs extends Annonces{
        function __construct($idUtilisateur, $mail, $pseudo, $mdp)
        {
            $this->idUtilisateur = $idUtilisateur;
            $this->mail = $mail;
            $this->pseudo = $pseudo;
            $this->mdp = $mdp;
        }
    }
?>