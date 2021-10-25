<?php session_start();
require_once 'Class/Bdd.php';

if (!isset($_SESSION['connected'])) {
    header('Location: SignInLogIn/login.php');
}
?>

<form action="SignInLogIn/logout.php" method="POST">
    <input type="submit" value="Déconnexion">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    


</body>
</html>