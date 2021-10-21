<?php session_start(); 
require_once '../Class/Bdd.php';
?>
<form method="post">
    <input type="text" name="mail" placeholder="Entrez votre mail" value="">
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="">
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="S'enregistrer">
</form>

<?php
if( isset($_POST['mail']) && isset($_POST['pseudo']) && isset($_POST['passwd']) && (!empty($_POST['mail'])) && (!empty($_POST['pseudo'])) && (!empty($_POST['passwd']))){
    $mail = strip_tags($_POST['mail']);
    $pseudo = strip_tags($_POST['pseudo']);
	$passwd = strip_tags($_POST['passwd']);

	//ICI on hash le password pour plus de sécurité
	$passwd = password_hash($passwd, PASSWORD_DEFAULT);

	// On écrit la requête
	$sql = 'INSERT INTO utilisateurs (mail_utilisateur, pseudo_utilisateur, mdp_utilisateur ) VALUES (:mail,:pseudo,:mdp)';
	// On prépare la requête
    $pdo =new Bdd();
    $bdd=  $pdo->connect();
	$query = $bdd->prepare($sql);
	// On injecte (terme scientifique) les valeurs
    $query->bindValue(':mail', $mail, PDO::PARAM_STR);
	$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$query->bindValue(':mdp', $passwd, PDO::PARAM_STR);
	// On exécute la requête
	$query->execute();
}
?>