<?php
    require_once 'Bdd.php';
    class ControleurImmobilier extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                type_immobilier,
                surface_immobilier,
                nbpiece_immobilier,
                id_annonce) VALUE (?,?,?,?)';
            $sql = $this-> connect()->prepare($requete);
            $sql -> execute($value);
            return "Annonce enregistrée";
        }
    }
?>