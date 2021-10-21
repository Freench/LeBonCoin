<?php
    require_once 'bdd.php';
    require_once 'Annonces.php';
    class PhotoAnnonces extends Annonces{
        function __construct($id_photo_annonce, $photo_annonce, $idAnnonce)
        {
            $this->id_photo_annonce = $id_photo_annonce;
            $this->photo_annonce = $photo_annonce;
            $this->idAnnonce = $idAnnonce;
        }
    }
?>