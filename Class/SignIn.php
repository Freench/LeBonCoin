<?php
    require_once '../Class/Bdd.php';
    class SignIn extends Bdd {
        function analyseEntree(){
            if( isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd']) && (!empty($_GET['mail'])) && (!empty($_GET['pseudo'])) && (!empty($_GET['passwd']))){
                $mail = strip_tags($_GET['mail']);
                $pseudo = strip_tags($_GET['pseudo']);
                $passwd = strip_tags($_GET['passwd']);
                // ICI on hash le password pour plus de sécurité
                $passwd = password_hash($passwd, PASSWORD_DEFAULT);
                return [$mail, $pseudo, $passwd]; 
            }
        }

        function insert($table){
            $sql =  "INSERT INTO utilisateurs (
                mail_utilisateur,
                pseudo_utilisateur,
                mdp_utilisateur) VALUE (?, ?, ?)";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query -> execute($table);
        }
    }
?>