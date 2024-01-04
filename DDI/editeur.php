<?php
 require_once("ConnexBase.php");
 class Editeur {
        private $id_editeur;
        private $nom_editeur;
        private $date_edition;
        private $connex;
    
        public function __construct(){
            $this->id_editeur = 0;
            $this->nom_editeur = "";
            $this->date_edition= "";
            $this->connex = ConnexBase::connect();
        }

    
        public function setNom_editeur($nom_editeur){
            $this->nom_editeur=$nom_editeur;
        }
        public function setDate_edition($date_edition){
            $this->date_edition=$date_edition;
        }
        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getNom_editeur(){
            return $this->nom_editeur;
        }
        public function getDate_edition(){
            return $this->date_edition;
        }
       
        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO editeur VALUES(null,:nom_editeur,:date_edition)");
            $requete->execute(array(
                "nom_editeur"=>$this->getNom_editeur(),
                "date_edition"=>$this->getDate_edition()
            ));
        }

        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM editeur");
            $sql->execute();
            while($editeur = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo $editeur["nom_editeur"];
                echo $editeur["date_edition"];
            }   
        }

        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(id_editeur) FROM editeur");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(id_editeur)'];
             }
        }

        
        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE editeur SET nom_editeur='{$this->getNom_editeur()}', date_edition='{$this->getDate_edition()}' WHERE id_editeur={$id} ");
            $requete->execute();
        }

        public function recupereId(){
            $id=$this->connex->prepare("SELECT * FROM editeur WHERE nom_editeur='{$nomed}'");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_editeur'];
             }
        }
    }
?>