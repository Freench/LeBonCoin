<?php session_start();
    require_once '../Class/Bdd.php';
    class SignIn extends Bdd {
        function __construct(){
             
            $this -> analyseEntree();
            if($this->mail == $this->analyseMailBdd()){
                if($this->pseudo == $this->analysePseudoBdd()){
                    if($this->mdp == $this->analyseMdpOk()){
                        echo "super!!!";
                        $this -> hashMdp();
                        $this -> insert();
                    }
                }
            } 
        }

        function analyseEntree(){
            if( isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd']) && (!empty($_GET['mail'])) && (!empty($_GET['pseudo'])) && (!empty($_GET['passwd']))){
                $mail = strip_tags($_GET['mail']);
                $pseudo = strip_tags($_GET['pseudo']);
                $passwd = strip_tags($_GET['passwd']);
                // ICI on hash le password pour plus de sécurité
                $this->mail = $mail;
                $this->pseudo = $pseudo;
                $this->mdp = $passwd; 
            }
        }

        function analyseMailBdd(){
            $sql =  "SELECT * FROM utilisateurs WHERE mail_utilisateur = ?";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query->execute([$this->mail]);
	        $user = $query->fetch(PDO::FETCH_ASSOC);
            if(!empty($user)){
                echo 'Désolé, '.$this->pseudo.' est déjà utilisé.';
                return false;
            }else{
                return true;
            }
        }

        function analysePseudoBdd(){
            $sql =  "SELECT * FROM utilisateurs WHERE pseudo_utilisateur = ?";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query->execute([$this->pseudo]);
	        $user = $query->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($user)){
                echo 'Désolé, '.$this->pseudo.' est déjà utilisé.';
                return false;
            }else{
                return true;
            }
        }

        function analyseMdpOk(){

            $listeSpecialChar = ['!','#','$','%','&','(',')','*','+','-','.',':','=','?','@','[',']','^','{','|','}','~'];
            $listeMinuscule = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
            $listeMajuscule = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            $listeChiffre = ['0','1','2','3','4','5','6','7','8','9'];

            $asSpecial = false; 
            for($i=0; $i< count($listeSpecialChar)  ;$i++){
                if(strpos($this->mdp, $listeSpecialChar[$i], 0)){
                    $asSpecial = true;
                }
            }
            if(!$asSpecial){
                echo "<div class=".'affichageEcho'.">Le mot de passe doit contenir au moins un caractère spécial.</div>";
                return false;
            }

            $minuscule = false;
            $majuscule = false;
            for($i=0; $i < count($listeMinuscule);$i++){
                if(!strpos($this->mdp, $listeMinuscule[$i], 0)){
                    $minuscule = true;
                }
                if(!strpos($this->mdp, $listeMajuscule[$i], 0)){
                    $majuscule = true;
                }
            }
            if(!$minuscule){
                echo "<div class=".'affichageEcho'.">Le mot de passe doit contenir au moins un caractère minuscule.</div> ";
                return false;
            }
            if(!$majuscule){
                echo "<div class=".'affichageEcho'.">Le mot de passe doit contenir au moins un caractère majuscule.</div> ";
                return false;
            }

            $asChiffre = false; 
            for($i=0; $i< count($listeChiffre);$i++){
                if(strpos($this->mdp, $listeChiffre[$i], 0)){
                    $asChiffre = true;
                }
            }
            if(!$asChiffre){
                echo "<div class=".'affichageEcho'.">Le mot de passe doit contenir au moins un chiffre.</div> ";
                return false;
            }

            $longeur = strlen($this->mdp);
            if(!($longeur >= 8 && $longeur <= 50)){
                echo "<div class=".'affichageEcho'.">Le mot de passe doit comprendre : entre 8 et 50 caractères</div>";
                return false;
            }

            return true;
        }

        function hashMdp(){
            $this->mdpHash = password_hash($this->mdp, PASSWORD_DEFAULT);
        }

        function insert(){
            $sql =  "INSERT INTO utilisateurs (
                mail_utilisateur,
                pseudo_utilisateur,
                mdp_utilisateur) VALUE (?, ?, ?)";
                // mdp_utilisateur) VALUE ("$this->mail = $mail", "$this->pseudo = $pseudo", "$this->mdp = $passwd")";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query -> execute([$this->mail,$this->pseudo,$this->mdpHash]);
        }

        
    }
?>