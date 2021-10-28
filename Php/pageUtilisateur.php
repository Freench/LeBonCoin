<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"   integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Css/style.css">    
    </head>

    <body>
        <?php session_start();
    require_once '../Class/Vue.php';
    $a = ["id_annonce" => 1,"titre_annonce" => "Voiture normale","id_categorie" =>1,"description_annonce" => "Voiture HyperSonic","prix_annonce" => 500000,"localisation_annonce" => "champagnole","id_utilisateur" => 1];

    $tableau = [$a,$a,$a,$a,$a,$a];
    $idPageUtilisateur = $_GET['idPageUtilisateur'];
    $vue = new Vue();
    $vue -> afficherToutesCartes($tableau, $idPageUtilisateur);
    // $controleurAnnonces = new ControleurAnnonces();
    // $id_annonce = $controleurAnnonces->insert(["a","a","a",10,"a",1]);
    // $id_annonce =intval( $id_annonce);
        ?>
    </body>
</html>

