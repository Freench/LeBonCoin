<?php
    require_once 'Bdd.php';
    class ControleurInformatiques extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                etats_informatique,
                id_annonce) VALUE (?,?)';
            $pdo = $this-> connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            return $pdo->lastInsertId();
        }
    }
?>