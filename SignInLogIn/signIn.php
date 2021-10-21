<?php session_start(); 
require_once '../Class/Bdd.php';
require_once '../Class/SignIn.php';

?>
<form method="GET" action="">
    <input type="text" name="mail" placeholder="Entrez votre mail" value="">
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="">
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="S'enregistrer">
</form>


<?php

$test = new SignIn();
$hgcc= $test -> analyseEntree();
var_dump($hgcc) ;
$test -> insert($hgcc);

?>

