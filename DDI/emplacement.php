<?php
 class Emplacement {
        private $nom_rayon;
        private $connex;
       
        public function __construct(){
            $this->nom_rayon = "";
            $this->connex = ConnexBase::connect();
        }

        public function setNom_rayon($nom_rayon){
            $this->nom_rayon=$nom_rayon;
        }
      
        public function setConnex($connex){
            $this->connex=$connex;
        } 
      
        public function getNom_rayon(){
            return $this->nom_rayon;
        }

        
        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO emplacement VALUES(null,:nom_rayon)");
            $requete->execute(array(
                "nom_rayon"=>$this->getNom_rayon(),
                
            ));
        }
        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM emplacement");
            $sql->execute();
            while($emplacement = $sql->fetch(PDO::FETCH_ASSOC)) {
                
                echo '<option>'.$emplacement["nom_rayon"].'</option>';
               
             }
        } 

        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE emplacement SET nom_rayon={$this->getNom_rayon()} WHERE id_rayon={$id} ");
            $requete->execute();
        }


        public function afficherTri(){
            $sql = $this->connex->prepare("SELECT * FROM Emplacement");
            $sql->execute();
            while($emplacement = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option><?php echo $emplacement["nom_rayon"];?> </option>
                <?php
             }
        }

         public function recupereId($nom_rayon){
            $id=$this->connex->prepare("SELECT * FROM emplacement WHERE nom_rayon='{$nom_rayon}'");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_rayon'];
             }
             
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