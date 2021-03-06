<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La bonne oca'z</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"   integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../Css/style.css">    
    </head>

    <body>
        <?php 
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
        ?>
    </body>
</html>