<?php
 require_once("ConnexBase.php");
 class Auteur {
        private $id_auteur;
        private $nom_auteur;
        private $connex;
    
        public function __construct(){
            $this->id_auteur = 0;
            $this->nom_auteur = "";
            $this->prenom_auteur= "";
            $this->connex = ConnexBase::connect();
        }

        public function setId_auteur($id){
            $this->id_auteur=$id_auteur;
        }

        public function setNom_auteur($nom_auteur){
            $this->nom_auteur=$nom_auteur;
        }

           
        public function setconnex($connex){
            $this->connex=$connex;
        }

        public function getId_auteur(){
            return $this->id;
        }

        public function getNom_auteur(){
            return $this->nom_auteur;
        }

      
        public function getconnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO auteur VALUES(null,:nom_auteur)");
            $requete->execute(array(
                "nom_auteur"=>$this->getNom_auteur(),
            ));
        }
        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM auteur");
            $sql->execute();
            while($auteur = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo $auteur["nom_auteur"];
             }
        }

        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(id_auteur) FROM auteur");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(id_auteur)'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE auteur SET nom_auteur='{$this->getNom_auteur()}' WHERE id_auteur={$id} ");
            $requete->execute();
        }
 }
?>