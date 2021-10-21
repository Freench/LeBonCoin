<?php
    require_once 'Bdd.php';

    class ControleurAnnonces extends Bdd{
        public function insert($values){
            $requete = 'INSERT INTO annonces (
                titre_annonce,
                categorie_annonce,
                description_annonce,
                prix_annonce,
                localisation_annonce,
                id_utilisateur) VALUES (?, ?, ?, ?, ?, ?)';
            $pdo= $this->connect();
            $sql = $pdo->prepare($requete);
            $sql->execute($values);
            return $pdo->lastInsertId();
        }
    }

?>