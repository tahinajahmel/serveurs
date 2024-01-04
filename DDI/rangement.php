<?php
 class Rangement {
        private $id_ranger;
        private $nom_ranger;
        private $connex;
       
        public function __construct(){
            $this->id_ranger = 0;
            $this->nom_ranger="";
            $this->connex = ConnexBase::connect();
        }

        public function setId_ranger($id_ranger){
            $this->id_ranger=$id_ranger;
        }
      
        public function setNom_ranger($nom_ranger){
            $this->nom_ranger=$nom_ranger;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        } 
      
        public function getId_ranger(){
            return $this->id_ranger;
        }

        public function getNom_ranger(){
            return $this->nom_ranger;
        
        }
        
        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO rangement VALUES(null,:nom_ranger)");
            $requete->execute(array(
                "nom_ranger"=>$this->getNom_ranger(),
                
            ));
        }
       
        public function afficherClass(){
            $sql = $this->connex->prepare("SELECT * FROM ranger");
            $sql->execute();
            while($Ranger = $sql->fetch(PDO::FETCH_ASSOC)) {
                
                echo '<option value="'.$Ranger["nom_ranger"].'">'.$Ranger["nom_ranger"].'</option>';
               
             }
        }
        

        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM rangement");
            $sql->execute();
            while($ranger = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="'.$ranger["id_rangement"].'">'.$ranger["nom_rangement"].'</option>';
             }
        }

         public function recupereId($nom_ranger){
            $id=$this->connex->prepare("SELECT * FROM rangement WHERE nom_rangement='$nom_ranger'");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_rangement'];
             }
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE rangement SET nom_rangement={$this->getNom_rangement()} WHERE id_rangement={$id} ");
            $requete->execute();
        }

        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(reference) FROM livre");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(reference)'];
             }
        }
 }
?>