<?php
    require_once 'Bdd.php';
    class ControleurVoiture extends Bdd{
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
            $sql = $this-> connect()->prepare($requete);
            $sql -> execute($value);
            return "Annonce enregistrée";
        }
    }
?>