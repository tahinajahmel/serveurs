<?php
 require_once("ConnexBase.php");
 class Editer {
        private $reference;
        private $id_editeur;
    
        public function __construct(){
            $this->reference = 0;
            $this->id_editeur = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setId_editeur($id_editeur){
            $this->id_editeur=$id_editeur;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getId_editeur(){
            return $this->id_editeur;
        }

        public function getConnex(){
            return $this->connex;
        }
        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO editer VALUES(:reference,:id_editeur)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_editeur"=>$this->getId_editeur()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_editeur FROM editer WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_editeur'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE editer SET id_editeur={$this->getId_editeur()} WHERE reference={$id} ");
            $requete->execute();
        }
 }
?>