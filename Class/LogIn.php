<?php session_start();
    require_once '../Class/Bdd.php';
    class LogIn extends Bdd {
        function analyseEntreeLogin(){
            if (isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd']) && (!empty($_GET['pseudo'])) && (!empty($_GET['pseudo'])) && (!empty($_GET['passwd']))) {
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
                $mdpUser = $user['mdp_utilisateur'];
                // return [$mail, $pseudo, $passwd, $mdpUser];
                $this->mail = $mail;
                $this->pseudo = $pseudo;
                $this->mdp = $passwd;
                $this->mdpUser = $mdpUser;

            }
        }

        function redirection(){
            if (!($this->pseudo)) {
                echo 'Désolé cet utilisateur n\'existe pas!';
            }else {
                $_SESSION['connected'] = true;
                //On utilise password_verify pour s'assurer que le mot de passe saisie est bien celui que nous avons en crypté dans la base de données
                if (password_verify($this->mdp, $this->mdpUser)) {
                    //Si c'est bon nous créons notre variable de session et faisons la redirection.
                    $_SESSION['nameUser'] = $this->mail;
                    header('location: ../index.php');
                } else {
                    echo 'Le mot de passe est invalide.';
                }
            }
        }
    }
?> 
