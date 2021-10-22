<?php session_start();
    require_once '../Class/Bdd.php';
    class LogOut extends Bdd {
        session_start();
        session_destroy();
        header('location: ../index.php');
    }
?>