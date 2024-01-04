<?php
 require_once("ConnexBase.php");
 
    class Utilisateur {
        private $identificationentification;
        private $nom;
        private $pass;
        private $connex;
        

        public function __construct(){
            $this->identification = 0;
            $this->nom = "" ;
            $this->pass = "" ;

            $this->connex = connexBase::connect();
        }

        public function setNom($nom){
            $this->nom = $nom;
        }
         
        public function setPass($pass){
            $this->pass = $pass;
        }
        public function setConnex($connex){
            $this->connex=$connex;
        }
        public function getNom(){
            return $this->nom;
        }

        public function getPass(){
            return $this->pass;
        }

        public function getConnex(){
            return $this->connex;
        }

        public function connexion($nom,$pass){
            $sql=$this->connex->prepare("SELECT * FROM `utilisateur` WHERE nom=? AND pass=? ");
            $sql->execute(array($nom, $pass));
            $tab=$sql->fetchAll();
            if(count($tab) != 0){
                    $_SESSION["autoriser"]="oui";
                    $_SESSION["nom"]=$tab[0]["nom"];
                    $_SESSION["identification"]=$tab[0]["identification"];
                    header("location:page.php");
                }
        
        
        else{
           ?> 
           <script> alert ("Nom admin ou mot de passe incorrect, veuilez recommencer")</script>
           <?php
        }
    }
}
?>
 