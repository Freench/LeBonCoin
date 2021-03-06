<?php 
require_once '../Class/Bdd.php';
require_once '../Class/SignIn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"   integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Css/style.css">
</head>
    <body>
        <div class="conainer-fluid">
            <div id="bandeau">
                <span class="row">
                    <div id="titre">La Bonne Oca'z</div>
                </span>
            </div>
        </div>
        <div class="container">
        <a href="login.php">
        <button type="submit" name="submit" id="bouttonConnection" class="btn btn-primary" >Se connecter</button>
        </a>
            <div id="formIn" class="col-md-6">
                <div id="bonjour">Bonjour !</div>
                <div id="textIntro">Connectez-vous pour découvrir toutes nos annonces.</div>
                <form method="GET" action="">
                    <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
                    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
                    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
                    <button type="submit" name="submit" id="bouttonIn" class="btn btn-primary" >S'enregistrer</button>
                </form>
            </div>
        </div>

        <?php
        if(isset($_GET['submit'])){
            $test = new SignIn();
        }
        ?>

    </body>
</html>