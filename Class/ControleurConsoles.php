<?php
    require_once 'Bdd.php';
    class ControleurConsoles extends Bdd{
        function insert($value){
            $requete =  'INSERT INTO annonce (
                type_console,
                marque_console,
                modele_console,
                etat_console,
                id_annonce) VALUE (?,?,?,?,?)';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            return $pdo->lastInsertId();
        }
    }
?>