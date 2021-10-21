<?php
    require_once 'Bdd.php';
    class ControleurVoitures extends Bdd{
        function insert($value){
            $requete =  'INSERT INTO annonce (
                marque_voiture,
                modele_voiture,
                kilometre_voiture,
                carburant_voiture,
                btvitesse_voiture,
                couleur_voiture,
                nbporte_voiture,
                puissance_voiture,
                nbplace_voiture,
                id_annonce) VALUE (?,?,?,?,?,?,?,?,?,?)';
            $pdo = $this-> connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            return $pdo->lastInsertId();
        }
    }
?>