<?php
    require_once('../Class/Bdd.php');
    $id_categorie = $_GET['params'];
    $requete = 'SELECT * FROM donnesspecifiques WHERE id_categories = '.$id_categorie;

    $db = new Bdd();
    $bdd = $db->connect();
    $sth = $bdd->prepare($requete);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    //[[1,'Voiture'], [2,'Immobilier'], [3,'Informatique'], [4,'diabolo']]
?>