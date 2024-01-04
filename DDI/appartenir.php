<?php
 require_once("ConnexBase.php");
 class Appartenir {
        private $reference;
        private $id_theme;
    
        public function __construct(){
            $this->reference = 0;
            $this->id_theme = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setId_theme($id_theme){
            $this->id_theme=$id_theme;
        }

        public function setconnex($connex){
            $this->connex=$connex;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getId_theme(){
            return $this->id_theme;
        }

        public function getconnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO appartenir VALUES(:reference,:id_theme)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_theme"=>$this->getId_theme()
            ));
        }
        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM appatrenir");
            $sql->execute();
            while($abonne = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo $appartenir["reference"];
                echo $appartenir["id_theme"];
            }
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_theme FROM appartenir WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_theme'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE appartenir SET id_theme={$this->getId_theme()} WHERE reference={$id} ");
            $requete->execute();
        }
 }
?>