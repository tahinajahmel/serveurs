<?php
 require_once("ConnexBase.php");
 class Theme {
        private $theme;
    
        public function __construct(){
            $this->theme = "";
            $this->connex = ConnexBase::connect();
        }

       
        public function setTheme($theme){
            $this->theme=$theme;
        }

        public function setconnex($connex){
            $this->connex=$connex;
        }

        public function getTheme(){
            return $this->theme;
        }

        public function getconnex(){
            return $this->connex;
        }


        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO theme VALUES(null,:theme)");
            $requete->execute(array(
                "theme"=>$this->getTheme()
            ));
        }
        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM theme");
            $sql->execute();
            while($theme = $sql->fetch(PDO::FETCH_ASSOC)) {
                
                echo '<option>'.strtolower($theme["sujet"]).'</option>';
             }
        }
    
        public function afficherListe(){
            $sql = $this->connex->prepare("SELECT * FROM theme");
            $sql->execute();
            while($theme = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                <td>".$theme["sujet"]."<td>
                <td class='ml-100'><button value='".$theme["id_theme"]."'><img src='vue/delete.png' width=20/></button></td>
                </tr>";
              
            }   
        }
        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(id_theme) FROM theme");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(id_theme)'];
             }
        }
        
        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE theme SET sujet='{$this->getTheme()}' WHERE id_theme={$id} ");
            $requete->execute();
        }
 }
?>