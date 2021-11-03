<?php session_start();
include 'header.php';
include 'nav.php';
require_once '../Class/Vue.php';
require_once '../Class/ControleurAnnonces.php';
    if (!isset($_SESSION['connected'])) {
        header('Location: ../SignInLogIn/login.php');
    }
    $idPageUtilisateur = $_GET['idPageUtilisateur'];
    $vue = new Vue();
    $controleur = new ControleurAnnonces();
    $vue -> afficherToutesCartes($controleur -> selectAnnoncesByIdUtilisateur($idPageUtilisateur), $idPageUtilisateur);

    if(isset($_GET['Suppr'])){
        $controleur -> deleteAnnonces($_GET['Suppr']);
    }

    include 'footer.php';
?>
    </body>
</html>


