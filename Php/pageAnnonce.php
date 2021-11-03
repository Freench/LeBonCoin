
<?php 
    include 'header.php';
    include 'nav.php';
    require_once '../Class/Vue.php';
    require_once '../Class/ControleurAnnonces.php';
    require_once '../Class/ControleurCategories.php';
    require_once '../Class/LogIn.php';
        if (!isset($_SESSION['connected'])) {
            header('Location: ../SignInLogIn/login.php');
        }
    $idPageUtilisateur = $_GET['idPageUtilisateur'];
    $vue = new Vue();

    $controleur = new ControleurAnnonces();
    $annonceTableau = $controleur->selectAnnoncesByIdAnnonce($_GET['voirAnnonce']);

    $annonce = new Annonces($annonceTableau);

    $categorie = new ControleurCategories();
    $specificitees = $categorie->selectSpecificiteesByCategorie($annonce->categorie);
    
    $login = new LogIn();
    $userAnnonce = $login ->selectUserById($annonceTableau['id_utilisateur']);

    $user = new Utilisateurs($userAnnonce);
    $vue -> afficherUneAnnonce($annonce,$user);
    $detailAnnonce =  $controleur->selectAnnonceDetails($_GET['voirAnnonce']);
    $vue->afficheDetails($specificitees,$detailAnnonce);
    $vue->afficherBtSuppr($idPageUtilisateur, $_GET['voirAnnonce']);
        if(isset($_GET['Suppr'])){
            $controleur -> deleteAnnonces($_GET['Suppr']);
        }
        include 'footer.php';
?>
    </body>
</html>