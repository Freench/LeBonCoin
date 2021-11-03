<?php 
require_once "Annonces.php";
require_once "Utilisateurs.php";
    class Vue extends Bdd {
        function afficherToutesCartes($tableau,$idPageUtilisateur){
            echo '<div class="container">';
                foreach($tableau as $row){
                    $annonce = new Annonces($row);
                    $this->afficherUneCarte($annonce,$idPageUtilisateur,$annonce->idAnnonce);
            echo'</div>';
                // var_dump($this->recupImage($idPageUtilisateur));
            }
        }

        function afficherUneCarte($annonce, $idPageUtilisateur, $idAnnonce){
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
                    echo '<form method="GET" action="../../../projet8/LeBonCoin/Php/pageAnnonce.php"><button name="voirAnnonce" type="submit" class="btn btn-primary" value='.$idAnnonce.'>Voir l\'annonce</button><input type="hidden" name="idPageUtilisateur" value="'.$idPageUtilisateur.'"></form>';
                    $this->afficherBtSuppr($idPageUtilisateur, $idAnnonce); 
                echo '</div>';
            echo "</div>";
            
        }
        
        function afficherUneAnnonce($annonce,$utilisateur){
            echo '<div class="container">';
                echo '<div class="col-md-8 infoAnnonce">';
                    echo'<div id="photoAnnonce" class="row">';
                        echo '<div class="col-md-8"><img src="../upload" alt="une Image" height="20vh" width="75%"></div>';
                        echo '<div id="blockAnnonceur" class="col-md-4">';
                            echo'<button id="btUtilisateur" class="btn btn-light">'.$utilisateur->pseudo.'</button>';
                            echo'<button class="btn btn-light">'.$utilisateur->mail.'</button>';
                        echo '</div>';
                    echo'</div>';
                    echo '<h5>'.$annonce->titre.'</h5>';
                    echo '<p>'.$annonce->prix.' €'.'</p>';
                    echo '<p>'.$annonce->localisation.'</p>';
                    echo '<p>'.$annonce->description.'</p>';
                echo'</div>';
            echo'</div>';
        }

        function afficheDetails($specificitees,$details){
            echo '<div class="container blockDetails">';
                echo '<div id="specificiteAnnonce" class="row">';
                    for($i=0;$i<count($specificitees);$i++){
                        echo '<div class="col-md-2 descriptionAnnonce"><span class="specificitees">'. $specificitees[$i]['nom_data'].'</span><br>'.'<span class="details">'.$details[$i]['valeur_ordre'].'</span><br></div>';
                    }
                echo '</div>';
            echo '</div>';
        }

        function afficherBtSuppr($idPageUtilisateur, $idAnnonce){
            if($_SESSION['idUser'] == $idPageUtilisateur){
                echo'<div id="btSuppr">';
                    echo '<form method="GET" action=""><button id="BtSupprimer" name="Suppr" type="submit" class="btn btn-danger" value='.$idAnnonce.'>Supprimer</button><input type="hidden" name="idPageUtilisateur" value="'.$idPageUtilisateur.'"></form>';
                echo'</div>';
            }
        }
    
        function recupImage(){
        //     $requete = 'SELECT photo FROM photosannonces WHERE id_annonce =58';
        //     $pdo = $this->connect();
        //     $sql =$pdo ->prepare($requete);
        //     $sql -> execute();
        //     $SelectImg = $sql->fetch(PDO::FETCH_ASSOC);
        //     //header("Content-type: image/png");
        //     //echo $SelectImg['photo'];
        //     //echo '<img src="'.$SelectImg['photo'].'" style="width:128px;height:128px">';
        }
    }
?>