<?php session_start();
    require_once '../Class/Bdd.php';
    class LogIn extends Bdd {

        function __construct(){
            if($this->analyseEntreeLogin()){
               $this->redirection($this->pseudo); 
            } 
        }

        function analyseEntreeLogin(){
            if (isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd']) && (!empty($_GET['mail'])) && (!empty($_GET['pseudo'])) && (!empty($_GET['passwd']))) {
                $mail = strip_tags($_GET['mail']);
                $pseudo = strip_tags($_GET['pseudo']);
                $passwd = strip_tags($_GET['passwd']);
                // On écrit la requête
                $sql = 'SELECT * FROM utilisateurs WHERE pseudo_utilisateur = :pseudo';
                // On prépare la requête
                $pdo = $this->connect();
                $query = $pdo->prepare($sql);
                // On injecte (terme scientifique) les valeurs
                $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                // On exécute la requête
                $user = $query->execute();
	            $user = $query->fetch(PDO::FETCH_ASSOC);
                if(!empty($user)){
                    $mdpUser = $user['mdp_utilisateur'];
                    $idUser = $user['id_utilisateur'];
                    $this->mail = $mail;
                    $this->pseudo = $pseudo;
                    $this->mdp = $passwd;
                    $this->mdpUser = $mdpUser;
                    $this->idUser = $idUser;
                }else{
                    echo "<div class=".'affichageEcho'.">Pseudo non reconnu</div>";
                    return false;
                }
                return true;
            }
            return false;
        }

        function redirection(){
            if (!($this->pseudo)) {
                echo "<div class=".'affichageEcho'.">Désolé cet utilisateur n\'existe pas!</div>";
            }else {
                $_SESSION['connected'] = true;
                //On utilise password_verify pour s'assurer que le mot de passe saisie est bien celui que nous avons en crypté dans la base de données
                if (password_verify($this->mdp, $this->mdpUser)) {
                    //Si c'est bon nous créons notre variable de session et faisons la redirection.
                    $_SESSION['nameUser'] = $this->pseudo;
                    $_SESSION['idUser'] = $this->idUser;
                    header('location: ../index.php');
                } else {
                    echo "<div class=".'affichageEcho'.">Le mot de passe est invalide.</div>";
                }
            }
        }
    }


    
?>


