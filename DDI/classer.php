<?php
 require_once("ConnexBase.php");
 class Classer {
        private $id_classement;
        private $reference;
    
        public function __construct(){
            $this->id_classement = 0;
            $this->reference = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setId_classement($id_classement){
            $this->id_classement=$id_classement;
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getId_classement(){
            return $this->id_classement;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO classer VALUES(:reference,:id_classement)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_classement"=>$this->getId_classement()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_classement FROM classer WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_classement'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE classer SET id_classement={$this->getId_classement()} WHERE reference={$id} ");
            $requete->execute();
        }

 }
?>