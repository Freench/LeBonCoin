<?php
    require_once 'Bdd.php';
    class ControleurConsole extends Bdd{
        function insert($value){
            $requete =  'INSERT INTO annonce (
                type_console,
                marque_console,
                modele_console,
                etat_console,
                id_annonce) VALUE (?,?,?,?,?)';
            $sql = $this-> connect()->prepare($requete);
            $sql -> execute($value);
            return "Annonce enregistrée";
        }
    }
?>