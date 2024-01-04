<?php
 require_once("ConnexBase.php");
 class Estattribuer {
        private $id_categorie;
        private $reference;
    
        public function __construct(){
            $this->id_categorie = 0;
            $this->reference = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setId_categorie($id_categorie){
            $this->id_categorie=$id_categorie;
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getId_categorie(){
            return $this->id_categorie;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO estattribuer VALUES(:reference,:id_categorie)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_categorie"=>$this->getId_categorie()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_categorie FROM categorie WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_categorie'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE estattribuer SET id_categorie={$this->getId_categorie()} WHERE reference={$id} ");
            $requete->execute();
        }

 }
?>