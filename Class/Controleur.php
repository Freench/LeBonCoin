<?php session_start();
    require_once 'Annonces.php';
    class Controleur extends Bdd{

        function __construct(){
            if($this->analyseEntreeAnnonce()){ 
                $this->insertAnnonces(); 
            }
        }
        
        function analyseEntreeAnnonce(){
            if (isset($_GET['titreAnnonce']) && isset($_GET['prixAnnonce']) && isset($_GET['photoAnnonce']) && isset($_GET['localisationAnnonce']) && isset($_GET['descriptionAnnonce']) && isset($_GET['categorieAnnonce']) && (!empty($_GET['categorieAnnonce'])) && (!empty($_GET['titreAnnonce'])) && (!empty($_GET['descriptionAnnonce'])) && (!empty($_GET['prixAnnonce'])) && (!empty($_GET['photoAnnonce'])) && (!empty($_GET['localisationAnnonce']))) {
                $titre = strip_tags($_GET['titreAnnonce']);
                $prix = strip_tags($_GET['prixAnnonce']);
                $photo = strip_tags($_GET['photoAnnonce']);
                $localisation = strip_tags($_GET['localisationAnnonce']);
                $description = strip_tags($_GET['descriptionAnnonce']);
                $categorie = strip_tags($_GET['categorieAnnonce']);
                $this->titre = $titre;
                $this->prix = $prix;
                $this->photo = $photo;
                $this->localisation = $localisation;
                $this->description = $description;
                $this->idCategorie = $categorie;
                $this->idUtilisateur = $_SESSION['idUser'];
                return true;
            }
        }        

        function insertAnnonces(){
            $requete =  'INSERT INTO annonces (
                titre_annonce,
                prix_annonce,
                photo_annonce,
                localisation_annonce,
                description_annonce,
                id_categorie,
                id_utilisateur) VALUE (?,?,?,?,?,?,?)';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$this->titre,$this->prix,$this->photo,$this->localisation,$this->description,$this->idCategorie,$this->idUtilisateur]);
        }

        // function insertAnnoncesDetails($values){
        //     $requete =  'INSERT INTO annoncesdetails (
        //         num_ordre,
        //         valeur_ordre,
        //         id_annonce) VALUE (?,?,?)';
        //     $pdo = $this->connect();
        //     $sql =$pdo ->prepare($requete);
        //     $sql -> execute($values);
        //     return $pdo->lastInsertId();
        // }

        function updateAnnonces(){
            $requete =  "UPDATE annonces SET
                titre_annonce = ?,
                prix_annonce = ?,
                photo_annonce = ?,
                localisation_annonce = ?,
                description_annonce = ?,
                id_categorie = ?,
                id_utilisateur = ?
                WHERE id_annonce =  ?";//VALEURDANSLEBOUTTON
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$this->titre,$this->prix,$this->photo,$this->localisation,$this->description,$this->idCategorie,$this->idUtilisateur]);
        }

        // function updateAnnoncesDetails($values, $id){
        //     $values.push($id);
        //     $requete =  "UPDATE annoncesdetails SET
        //     num_ordre = ?,
        //     valeur_ordre = ?,
        //     WHERE id_annonce =  ?";
        //     $pdo = $this->connect();
        //     $sql =$pdo ->prepare($requete);
        //     $sql -> execute($values);
        //     return $pdo->lastInsertId();
        // }

        function deleteAnnonces($id){
            $requete =  'DELETE FROM annonces WHERE id_annonce = ?';//VALEURDANSLEBOUTTON
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$id]);
            return $pdo->lastInsertId();
        }

        // function deleteAnnoncesDetails($id){
        //     $requete =  'DELETE FROM annoncesdetails WHERE id_annonce = ?';
        //     $pdo = $this->connect();
        //     $sql =$pdo ->prepare($requete);
        //     $sql -> execute([$id]);
        //     return $pdo->lastInsertId();
        // }

        function recherche($inputCategorie, $inputTitre, $inputLocalisation){
            $ajout = '';
            $value=[];
            if(!empty($inputCategorie)){
                $ajout.= ' && id_categorie = ?';
                array_push($value, $inputCategorie);
            }
            if(!empty($inputTitre)){
                $ajout.=' && titre_annonce = ?';
                array_push($value, $inputTitre);
            }
            if(!empty($inputLocalisation)){
                $ajout.=' && localisation_annonce = ?';
                array_push($value, $inputLocalisation);
            }
            $requete =  'SELECT FROM annonces WHERE id_annonce = ? '.$ajout.'';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute();

        }
    }
?>