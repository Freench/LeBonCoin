<?php
    require_once 'Bdd.php';
    require_once 'Annonces.php';
    class Utilisateurs extends Annonces{
        function __construct($valeur)
        {
            $this->idUtilisateur = $valeur['id_utilisateur'];
            $this->pseudo =  $valeur['pseudo_utilisateur'];
            $this->mail =  $valeur['mail_utilisateur'];
            $this->mdp =  $valeur['mdp_utilisateur'];
        }
    }
?>