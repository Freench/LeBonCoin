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

        function mdpOk($mdp){

            $listeSpecialChar = ['!','#','$','%','&','(',')','*','+','-','.',':','=','?','@','[',']','^','{','|','}','~'];
            $listeMinuscule = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
            $listeMajuscule = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            $listeChiffre = [0,1,2,3,4,5,6,7,8,9];

            $asSpecial = false; 
            for($i=0; $i< count($listeSpecialChar)  ;$i++){
                if(str_contains($mdp , $listeSpecialChar[$i])){
                    $asSpecial = true;
                }
            }

            if(!$asSpecial){
                echo " Le mot de passe doit contenir au moins un caractère spécial. ";
                return false;
            }

            $minuscule = false;
            $majuscule = false;

            for($i=0; $i < count($listeMinuscule);$i++){
                if(!str_contains($mdp , $listeMinuscule[$i])){
                    $minuscule = true;
                }

                if(!str_contains($mdp , $listeMajuscule[$i])){
                    $majuscule = true;
                }
            }

            if(!$minuscule){
                echo " Le mot de passe doit contenir au moins un caractère minuscule. ";
                return false;
            }

            if(!$majuscule){
                echo " Le mot de passe doit contenir au moins un caractère majuscule. ";
                return false;
            }

            $asChiffre = false; 
            for($i=0; $i< count($listeChiffre);$i++){
                if(str_contains($mdp , $listeChiffre[$i])){
                    $asSpecial = true;
                }
            }

            if(!$asChiffre){
                echo " Le mot de passe doit contenir au moins un chiffre. ";
                return false;
            }

            $longeur = strlen($mdp);
            if((8<= $longeur && $longeur <= 50)){
            }else{
                echo "Le mot de passe doit comprendre : entre 8 et 50 caractères ";
                return false;
            }
            return true;
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