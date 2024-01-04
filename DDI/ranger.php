<?php
 require_once("ConnexBase.php");
 class Ranger {
        private $id_ranger;
        private $reference;
    
        public function __construct(){
            $this->id_ranger = 0;
            $this->reference = 0;
            $this->connex = ConnexBase::connect();
        }

        public function setId_ranger($id_ranger){
            $this->id_ranger=$id_ranger;
        }

        public function setReference($reference){
            $this->reference=$reference;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getId_ranger(){
            return $this->id_ranger;
        }

        public function getReference(){
            return $this->reference;
        }

        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO ranger VALUES(:reference,:id_ranger)");
            $requete->execute(array(
                "reference"=>$this->getReference(),
                "id_ranger"=>$this->getId_ranger()
            ));
        }

        public function recupererId($reference){
            $id=$this->connex->prepare("SELECT id_rangement FROM ranger WHERE reference={$reference}");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_rangement'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE ranger SET id_rangement={$this->getId_ranger()} WHERE reference={$id} ");
            $requete->execute();
        }
 }
?>