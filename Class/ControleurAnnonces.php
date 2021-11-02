<?php //session_start();
    require_once 'Annonces.php';
    class ControleurAnnonces extends Bdd{

        function __construct(){
            if($this->analyseEntreeAnnonce()){ 
                $newIdAnnonce = $this->insertAnnonces();
                $this->insertPhoto($newIdAnnonce);
            }

            if(isset($_POST['Suppr'])){
                echo 'gluman '.$_POST['Suppr'].'';
                $this->deleteAnnonces($_POST['Suppr']);
            }
            if(isset($_GET['idPageUtilisateur'])){
                $this->selectAnnoncesByIdUtilisateur($_GET['idPageUtilisateur']);
            }
        }

        function analyseEntreeAnnonce(){
            if (isset($_POST['titreAnnonce']) && isset($_POST['prixAnnonce']) && isset($_FILES['photoAnnonce']) && isset($_POST['localisationAnnonce']) && isset($_POST['descriptionAnnonce']) && isset($_POST['categorieAnnonce']) && (!empty($_POST['categorieAnnonce'])) && (!empty($_POST['titreAnnonce'])) && (!empty($_POST['descriptionAnnonce'])) && (!empty($_POST['prixAnnonce'])) && (!empty($_FILES['photoAnnonce'])) && (!empty($_POST['localisationAnnonce']))) {
                $titre = strip_tags($_POST['titreAnnonce']);
                $prix = strip_tags($_POST['prixAnnonce']);
                $localisation = strip_tags($_POST['localisationAnnonce']);
                $description = strip_tags($_POST['descriptionAnnonce']);
                $categorie = strip_tags($_POST['categorieAnnonce']);
                $this->titre = $titre;
                $this->prix = $prix;
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
                localisation_annonce,
                description_annonce,
                id_categorie,
                id_utilisateur) VALUE (?,?,?,?,?,?)';
            $pdo = $this->connect();
            $sql = $pdo ->prepare($requete);
            $sql -> execute([$this->titre, $this->prix, $this->localisation, $this->description,10,$this->idUtilisateur]); 
            return $pdo->lastInsertId();
        }

        function selectAnnoncesByIdUtilisateur($id){
            $requete = 'SELECT * FROM annonces WHERE id_utilisateur = ?';
            $pdo = $this->connect();
            $sql = $pdo->prepare($requete);
            $sql-> execute([$id]);
            $result = $sql -> fetchAll();
            return $result;
        }
        function selectAnnoncesByIdAnnonce($id){
            $requete = 'SELECT * FROM annonces WHERE id_annonce = ?';
            $pdo = $this->connect();
            $sql = $pdo->prepare($requete);
            $sql-> execute([$id]);
            $result = $sql -> fetch();
            return $result;
        }

        function insertPhoto($newIdAnnonce){
            $tmpName = $_FILES['photoAnnonce']['tmp_name'];
            $name = $_FILES['photoAnnonce']['name'];
            $size = $_FILES['photoAnnonce']['size'];
            $error = $_FILES['photoAnnonce']['error'];      
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 400000;
        
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                //$file = 5f586bf96dcd38.73540086.jpg
                move_uploaded_file($tmpName, '../upload/'.$file);
                $requete =  'INSERT INTO photosannonces (
                                photo,
                                id_annonce) VALUE (?,?)';
                $pdo = $this->connect();
                $sql =$pdo ->prepare($requete);
                $sql -> execute([$file,$newIdAnnonce]);            
                echo "Image enregistrée";
            }
            else{
                echo "Une erreur est survenue";
            }
        }

        function updateAnnonces($id){
            $requete =  "UPDATE annonces SET
                titre_annonce = ?,
                prix_annonce = ?,
                localisation_annonce = ?,
                description_annonce = ?,
                id_categorie = ?,
                id_utilisateur = ?
                WHERE id_annonce =  ?";//VALEURDANSLEBOUTTON
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute([$this->titre,$this->prix,$this->localisation,$this->description,$this->idCategorie,$id]);
        }

        function deleteAnnonces($id){
                $requete =  'DELETE FROM annonces WHERE id_annonce = ? ';//VALEURDANSLEBOUTTON
                $pdo = $this->connect();
                $sql =$pdo ->prepare($requete);
                $sql -> execute([$id]);
                return true;
        }

        function insertAnnoncesDetails($values){
            $requete =  'INSERT INTO annoncesdetails (
                num_ordre,
                valeur_ordre,
                id_annonce) VALUE (?,?,?)';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($values);
            return $pdo->lastInsertId();
        }

        function selectAnnonceDetails($id){
            $requete = 'SELECT * FROM annoncesdetails WHERE id_annonce = ?';
            $pdo = $this->connect();
            $sql = $pdo->prepare($requete);
            $sql-> execute([$id]);
            $result = $sql -> fetchAll();
            return $result;
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
                $ajout.=' && titre_annonce LIKE ?';
                array_push($value, '%'.$inputTitre.'%');
            }
            if(!empty($inputLocalisation)){
                $ajout.=' && localisation_annonce LIKE ?';
                array_push($value, '%'.$inputLocalisation.'%');
            }
            $requete =  'SELECT * FROM annonces WHERE 1=1 '.$ajout.' ';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute($value);
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }
    }
?>