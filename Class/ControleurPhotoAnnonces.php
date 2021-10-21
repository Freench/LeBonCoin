<?php
    require_once 'Bdd.php';
    class ControleurPhotoAnnonces extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                photo_annonce,
                id_annonce) VALUE (?,?)';
            $pdo = $this-> connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            return $pdo->lastInsertId();
        }
    }
?>