<?php session_start(); 
require_once '../Class/Bdd.php';
require_once '../Class/SignIn.php';

?>
<form method="GET" action="">
    <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
    <input type="submit" name="submit" value="S'enregistrer">
</form>


<?php

if(isset($_GET['submit'])){
    $test = new SignIn();
    $parametreConnection = $test -> analyseEntree();
    if($test -> analyseMailBdd($parametreConnection[0])){
        if($test -> analysePseudoBdd($parametreConnection[1])){
            echo "super!!!";
        }
    }
    // var_dump($hgcc) ;
    $test -> insert($parametreConnection);
}

?>