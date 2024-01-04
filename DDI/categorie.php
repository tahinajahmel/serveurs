<?php
 require_once("ConnexBase.php");
 class Categorie {
        private $genre;
        private $connex;
        public function __construct(){
            $this->genre = "";
            $this->connex = ConnexBase::connect();
        }

        public function setGenre($genre){
            $this->genre=$genre;
        }
        public function setConnex($connex){
            $this->connecx=$connex;
        }


        public function getGenre(){
            return $this->genre;
        }

        public function getconnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO categorie VALUES(null,:genre)");
            $requete->execute(array(
                "genre"=>$this->getGenre(),
            ));
        }
        public function afficher(){
            $sql = $this->connex->prepare("SELECT * FROM categorie");
            $sql->execute();
            while($categorie = $sql->fetch(PDO::FETCH_ASSOC)) {
                
                echo '<option>'.$categorie["genre"].'</option>';
             }
        }

        public function afficherTous(){
            $sql = $this->connex->prepare("SELECT * FROM categorie");
            $sql->execute();
            while($categorie = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                          <div class="card-columns">
                                <button value="<?php echo $categorie["genre"];?>" class="card bg-primary" name="cat_genre">
                                <div class="card-body text-center">
                                    <p class="card-text"><a href="#"></a><strong><?php echo $categorie["genre"];?> </strong> </p>
                                </div>
                                </button>
                            </div>
                <?php
             }
        }

        public function afficherListe(){
            $sql = $this->connex->prepare("SELECT * FROM categorie");
            $sql->execute();
            while($categorie = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                <td>".$categorie["genre"]."<td>
                <td class='ml-100'><button class='float-right'name='supprCategorie' value='".$categorie["id_categorie"]."'><img src='vue/delete.png' width=20/></button></td>
                </tr>";
              
            }   
        }

        public function afficherTri(){
            $sql = $this->connex->prepare("SELECT * FROM categorie");
            $sql->execute();
            while($categorie = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
              <option><?php echo $categorie["genre"];?> </option>
                <?php
             }
        }

         public function recupereId($genre){
            $id=$this->connex->prepare("SELECT * FROM categorie WHERE genre='$genre'");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['id_categorie'];
             }
        }
        public function modifier($id){
            $requete=$this->connex->prepare("UPDATE categorie SET genre={$this->getGenre()} WHERE id_categorie={$id} ");
            $requete->execute();
        }

        public function supprimer($id){
            $sql=$this->connex->prepare("DELETE FROM categorie WHERE id_categorie={$id}");
            $sql->execute();
        }
    }
 
?>