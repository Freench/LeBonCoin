<?php
    require_once('Bdd.php');
    class ControleurCategories extends Bdd{
        function __construct(){
            $this->nom_categorie = null;
            $this->listSpecOrdre = null;
            $this->listSpecName = null;
            if($this->verification_categorie()){
                if($this->verification_specificite()){
                    $newIdCategorie = $this->insertCategorie();
                    $this->insertAllSpecificite($newIdCategorie);
                }
            }
        }

        function verification_categorie(){
            $nom_categorie = strip_tags($_GET["nom-categorie"]);
            $requete = 'SELECT * FROM categories WHERE nom_categorie = ?';
            $sql = $this->connect()->prepare($requete);
            $sql->execute([$nom_categorie]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if($result!=null){
                echo "Cette catégorie existe déjà";
                return false;
            }else{
                $this->nom_categorie = $nom_categorie;
                return true;
            }
        }

        function verification_specificite(){
            $listSpecOrdre = $_GET["ordre"];
            if(count($listSpecOrdre) != count(array_unique($listSpecOrdre))){
                echo "Les numéros d'ordre doivent être différents ";
                return false;
            }

            $listSpecName = $_GET["donnee"];
            foreach($listSpecName as $key=>$value){
                $value = strip_tags($value);
            }
            var_dump($listSpecName);
            $this->listSpecName = $listSpecName;
            $this->listSpecOrdre = $listSpecOrdre;
            return true;
        }

        function insertCategorie(){
            $requete = 'INSERT INTO categories (nom_categorie) VALUE (?)';
            $pdo = $this->connect();
            $sql = $pdo->prepare($requete);
            $sql->execute([$this->nom_categorie]);
            return  $pdo->lastInsertId();
        }

        function insertAllSpecificite($idCategorie){
            for($i = 0; $i<count($this->listSpecName); $i++){
                $requete = 'INSERT INTO donnesspecifiques (num_ordre, nom_data, id_categorie) VALUE (?,?,?)';
                $pdo = $this->connect();
                $sql = $pdo->prepare($requete);
                $sql->execute([$this->listSpecOrdre[$i], $this->listSpecName[$i], $idCategorie]);
            }
        }
}

?>