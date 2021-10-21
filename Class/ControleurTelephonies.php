<?php
    require_once 'Bdd.php';
    class ControleurTelephonies extends Bdd{
        function insert($value){
            $requete = 'INSERT INTO annonce (
                marque_console,
                modele_console,
                couleur_console,
                stockage_console,
                etat_console,
                id_annonce) VALUE (?,?,?,?,?,?)';
            $sql = $this-> connect()->prepare($requete);
            $sql -> execute($value);
            return "Annonce enregistrée";
        }
    }
?>