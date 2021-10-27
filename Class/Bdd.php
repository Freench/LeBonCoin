<?php
    class Bdd{
        const SERVERNAME = 'localhost';
        const USERNAME = 'francisp';
        const DBNAME = 'francisp_LeBonCoinV2';
        const PASSWORD = 'tk3p/odV3HLAig==';

        public function connect(){
            //On établit la connexion
            try
            {
                $bdd = new PDO('mysql:host='.$this::SERVERNAME.';dbname='.$this::DBNAME, $this::USERNAME, $this::PASSWORD);
                //On définit le mode d'erreur de PDO sur Exception
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $bdd;
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                /*On capture les exceptions si une exception est lancée et on affiche
                 *les informations relatives à celle-ci*/
            }
        }
        public function select(){
            echo 'select';
        }
    }

?>