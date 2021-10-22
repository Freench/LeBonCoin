<?php session_start();
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

        function analyseMailBdd($mail){
            $sql =  "SELECT * FROM utilisateurs WHERE mail_utilisateur = ?";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query->execute([$mail]);
	        $user = $query->fetch(PDO::FETCH_ASSOC);
            if(!empty($user)){
                echo 'Désolé, '.$mail.' est déjà utilisé.';
                return false;
            }else{
                return true;
            }
        }

        function analysePseudoBdd($pseudo){
            $sql =  "SELECT * FROM utilisateurs WHERE pseudo_utilisateur = ?";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query->execute([$pseudo]);
	        $user = $query->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($user)){
                echo 'Désolé, '.$pseudo.' est déjà utilisé.';
                return false;
            }else{
                return true;
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