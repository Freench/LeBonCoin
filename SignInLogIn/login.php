<?php 
require_once '../Class/Bdd.php';
require_once '../Class/LogIn.php';

?>

<form method="GET" action="">
    <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
    <input type="submit" name="submit" value="Se Connecter">
</form>

<a href="signin.php">
    <input type="submit" name="submit" value="S'enregistrer">
</a>

<?php

if(isset($_GET['submit'])){
	$test = new LogIn();
}

?>