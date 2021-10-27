<?php
    require_once 'Bdd.php';

    class ControleurUtilisateurs extends Bdd{
        public function insert($values){
            $requete = 'INSERT INTO utilisateurs (
                mail_utilisateur,
                pseudo_utilisateur,
                mdp_utilisateur) VALUES (?, ?, ?)';
            $sql = $this->connect()->prepare($requete);
            $sql->execute($values);
            return "Utilisateur enregistrée";
        }
    }

?>