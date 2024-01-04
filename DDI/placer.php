<?php
 require_once("ConnexBase.php");
 class Placer {
        private $id_rayon;
        private $reference;
    
        public function __construct(){
            $this->id_rayon = 0;
            $this->reference = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setid_rayon($id_rayon){
            $this->id_rayon=$id_rayon;
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getId_rayon(){
            return $this->id_rayon;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO Placer VALUES(:reference,:id_rayon)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_rayon"=>$this->getId_rayon()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_rayon FROM placer WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_rayon'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE placer SET id_rayon={$this->getId_rayon()} WHERE reference={$id} ");
            $requete->execute();
        }

 }
?>