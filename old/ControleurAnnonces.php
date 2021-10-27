<?php
    require_once 'Bdd.php';

    class ControleurAnnonces extends Bdd{
        public function insert($values){
            $requete = 'INSERT INTO annonces (
                titre_annonce,
                prix_annonce,
                localisation_annonce,
                description_annonce,
                id_categorie,
                id_utilisateur) VALUES (?, ?, ?, ?, ?, ?)';
            $pdo= $this->connect();
            $sql = $pdo->prepare($requete);
            $sql->execute($values);
            return $pdo->lastInsertId();
        }
        public function selectDonneesSpecifiquesByCategorieId($id){
            $requete = 'SELECT nom_data FROM donnesspecifiques WHERE id_categorie = ?';
            $pdo = $this->connect();
            $sql = $pdo->prepare($requete);
            $sql->execute([$id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>