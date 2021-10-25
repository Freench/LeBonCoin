<?php
    require_once 'Bdd.php';
    class Controleur extends Bdd{
        function insertAnnonces($values){
            $requete =  'INSERT INTO annonce (
                titre_annonce,
                prix_annonce,
                photo_annonce,
                localisation_annonce,
                id_annonce) VALUE (?,?,?,?,?)';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);
            return $pdo->lastInsertId();
        }

        function insertAnnoncesDetails($values){
            $requete =  'INSERT INTO annoncesdetails (
                num_ordre,
                valeur_ordre,
                id_annonce) VALUE (?,?,?)';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);
            return $pdo->lastInsertId();
        }

        function updateAnnonces($values, $id){
            $values.push($id);
            $requete =  "UPDATE annonces SET
                titre_annonce = ?,
                prix_annonce = ?,
                photo_annonce = ?,
                localisation_annonce = ?,
                WHERE id_annonce =  ?";
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);
            return $pdo->lastInsertId();
        }

        function updateAnnoncesDetails($values, $id){
            $values.push($id);
            $requete =  "UPDATE annoncesdetails SET
            num_ordre = ?,
            valeur_ordre = ?,
            WHERE id_annonce =  ?";
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);
            return $pdo->lastInsertId();
        }

        function deleteAnnonces($id){
            $requete =  'DELETE FROM annonces WHERE id_annonce = ?';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$id]);
            return $pdo->lastInsertId();
        }

        function deleteAnnoncesDetails($id){
            $requete =  'DELETE FROM annoncesdetails WHERE id_annonce = ?';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$id]);
            return $pdo->lastInsertId();
        }

        function recherche($inputCategorie, $inputTitre, $inputLocalisation){
            $value=[];
            if(!empty($inputCategorie)){
                $ajout.= ' && id_categorie = ?';
                array_push($value, $inputCategorie);
            }
            if(!empty($inputTitre)){
                $ajout.=' && titre_annonce = ?';
                array_push($value, $inputTitre);
            }
            if(!empty($inputLocalisation)){
                $ajout.=' && localisation_annonce = ?';
                array_push($value, $inputLocalisation);
            }
            $requete =  'SELECT FROM annonces WHERE id_annonce = ? '.$ajout.'';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);

        }
    }
?>