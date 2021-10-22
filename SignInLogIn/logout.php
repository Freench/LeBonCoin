<?php
require_once '../Class/Bdd.php';
session_start();
session_destroy();
header('location: login.php');
?>


