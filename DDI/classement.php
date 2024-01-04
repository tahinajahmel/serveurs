<?php
 require_once("ConnexBase.php");
 class Classement {
        private $id_classement;
        private $classement;
        private $connex;
    
        public function __construct(){
            $this->id_classement = 0;
            $this->classement = "";
            $this->connex = ConnexBase::connect();
        }

    
        public function setClassement($classement){
            $this->classement=$classement;
        }

        public function setConnex($connex){
            $this->connex=$connex;
        }

        public function getClassement(){
            return $this->classement;
        }

       
        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO classement VALUES(null,:classement)");
            $requete->execute(array(
                "classement"=>$this->getClassement(),
            ));
        }

        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM classement");
            $sql->execute();
            while($classement = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$classement["id_classement"]."'>".$classement["classement"]."</option>";
              
            }   
        }

        public function afficherListe(){
            $sql = $this->connex->prepare("SELECT * FROM classement");
            $sql->execute();
            while($classement = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                <td>".$classement["classement"]."<td>
                <td class='ml-100'><button value='".$classement["id_classement"]."'><img src='vue/delete.png' width=20/></button></td>
                </tr>";
              
            }   
        }

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE classement SET nom_classement={$this->getNom_classement()} WHERE id_classement={$id} ");
            $requete->execute();
        }

        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(id_classement) FROM classement");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(id_classement)'];
             }
        }

        public function recupereId($nom_classement){
            $id=$this->connex->prepare("SELECT * FROM classement WHERE classement='{$nom_classement}'");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_classement'];
             }
        }
    }
?>