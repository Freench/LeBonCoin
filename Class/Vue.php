<?php
require_once "Annonces.php";
    class Vue extends Bdd {
        function afficherToutesCartes($tableau){
            foreach($tableau as $row){
                $annonce = new Annonces($row);
                $this->afficherUneCarte($annonce);
                
            }
        }

        function afficherUneCarte($annonce){
            echo '<div class="card" style="width: 18rem;">';
                echo '<img class="card-img-top" src="..." alt="Card image cap">';
                echo ' <div class="card-body">';
                    echo '<h5 class="card-title">'.$annonce->titre.'</h5>';
                    echo '<p class="card-text">'.$annonce->description.'</p>';
                    echo '<a href="#" class="btn btn-primary">Voir l\'annonce</a>';
                echo '</div>';
            echo "</div>";
        }
    }
?>

<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->