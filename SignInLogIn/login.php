<?php 
    require_once '../Class/Bdd.php';
    require_once '../Class/LogIn.php';
    include '../Php/header.php'
?>

    <div class="conainer-fluid">
        <div id="bandeau">
            <span class="row">
                <div id="titre">La Bonne Oca'z</div>
            </span>
        </div>
    </div>

    <div class="container">
        <div id="formIn" class="col-md-6">
            <div id="bonjour">Bonjour !</div>
            <div id="textIntro">Inscrivez-vous pour découvrir toutes nos fonctionnalités.</div>
            <form method="GET" action="">
                <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
                <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
                <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
                <button type="submit" name="submit" id="bouttonIn" class="btn btn-primary" >Se connecter</button>
            </form>
            <div id="textSign">Envie de nous rejoindre ? <a href="signIn.php" id="linkSign">Créer un compte</a></div>
        </div>
    </div>

    <?php
        if(isset($_GET['submit'])){
            $login = new LogIn();
            if($login->analyseEntreeLogin()){
                $login->redirection($login->pseudo); 
            } 
        }
    ?>
    </body>
</html>