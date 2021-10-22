<?php 
require_once '../Class/Bdd.php';
require_once '../Class/LogIn.php';

?>

<form method="GET" action="">
    <input type="text" name="mail" placeholder="Entrez votre mail" value="">
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="">
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="Se Connecter">
</form>

<?php


$test = new Login();
$hgcc= $test -> analyseEntreeLogin();
var_dump($hgcc) ;
$test -> redirection($hgcc);
var_dump($test);

?>