<?php
    require_once 'Bdd.php';
    class ControleurImmobiliers extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                type_immobilier,
                surface_immobilier,
                nbpiece_immobilier,
                id_annonce) VALUE (?,?,?,?)';
            $pdo = $this-> connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            return $pdo->lastInsertId();
        }
    }
?>