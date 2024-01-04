<?php
 require_once("ConnexBase.php");
 class Ecrire {
        private $reference;
        private $id_auteur;
    
        public function __construct(){
            $this->reference = 0;
            $this->id_auteur = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setId_auteur($id_auteur){
            $this->id_auteur=$id_auteur;
        }

        public function setconnex($connex){
            $this->connex=$connex;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getId_auteur(){
            return $this->id_auteur;
        }

        public function getconnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO ecrire VALUES(:reference,:id_auteur)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_auteur"=>$this->getId_auteur()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_auteur FROM ecrire WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_auteur'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE ecrire SET id_auteur={$this->getId_auteur()} WHERE reference={$id} ");
            $requete->execute();
        }
        
 }
?>