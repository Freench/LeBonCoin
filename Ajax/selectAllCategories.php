<?php
    require_once('../Class/Bdd.php');
    $requete = 'SELECT * FROM categories WHERE 1=1';
    $db = new Bdd();
    $bdd = $db->connect();
    $sth = $bdd->prepare($requete);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    //[[1,'Voiture'], [2,'Immobilier'], [3,'Informatique'], [4,'diabolo']]
?>