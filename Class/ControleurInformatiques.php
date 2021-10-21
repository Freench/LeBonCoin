<?php
    require_once 'Bdd.php';
    class ControleurInformatiques extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                etats_informatique,
                id_annonce) VALUE (?,?)';
            $sql = $this-> connect()->prepare($requete);
            $sql -> execute($value);
            return "Annonce enregistrée";
        }
    }
?>