<?php 
require_once "Annonces.php";
    class Vue extends Bdd {
        function afficherToutesCartes($tableau,$idPageUtilisateur){
            foreach($tableau as $row){
                $annonce = new Annonces($row);
                $this->afficherUneCarte($annonce,$idPageUtilisateur,$annonce->idAnnonce);
                
                // var_dump($this->recupImage($idPageUtilisateur));
            }
        }

        function afficherUneCarte($annonce, $idPageUtilisateur, $idAnnonce){
            echo '<div class="container">';
                echo '<div class="card">';
                    echo ' <div class="card-body row">';
                        echo'<div class="col-4">';
                            echo '<img class="card-img-top" src="'.$this->recupImage().'" alt="Card image cap">';
                        echo '</div>';
                        echo '<div class="carteContenu col-4" >';
                            echo '<h5 class="card-title col">'.$annonce->titre.'</h5>';
                            echo '<p class="card-text prixAnnonce">'.$annonce->prix.'</p>';
                            echo '<p class="card-text localisationAnnonce">'.$annonce->localisation.'</p>';
                        echo '</div>';
                        echo '<div class="col-4 d-flex bouttonAnnonce">';
                            echo '<a href="#" class="btn btn-primary">Voir l\'annonce</a>';
                            if($_SESSION['idUser'] == $idPageUtilisateur){
                                echo '<form method="GET" action=""><button name="Suppr" type="submit" class="btn btn-danger" value='.$idAnnonce.'>Supprimer</button><input type="hidden" name="idPageUtilisateur" value="'.$idPageUtilisateur.'"></form>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo "</div>";
            echo'</div>';
        }

        function recupImage(){
            $requete = 'SELECT photo FROM photosannonces WHERE id_annonce =58';
            $pdo = $this->connect();
            $sql =$pdo ->prepare($requete);
            $sql -> execute();
            $SelectImg = $sql->fetch(PDO::FETCH_ASSOC);
            //header("Content-type: image/png");
            echo $SelectImg['photo'];
            //echo '<img src="'.$SelectImg['photo'].'" style="width:128px;height:128px">';
        }
    }
?>




