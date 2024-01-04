<?php
 require_once("ConnexBase.php");
 class Livre {
        private $code1;
        private $code2;
        private $titre;
        private $connex;
        
        public function __construct(){
            $this->code1 = "";
            $this->code2 = "";
            $this->titre = "";
            $this->connex = ConnexBase::connect();
        }

        
        public function setCode1($code1){
            $this->code1=$code1;
        }

        public function setCode2($code2){
            $this->code2=$code2;
        }

        public function setTitre($titre){
            $this->titre=$titre;
        }
         
        public function setConnex($connex){
            $this->connex=$connex;
        }
        
        public function getCode1(){
            return $this->code1;
        }

        public function getCode2(){
            return $this->code2;
        }

        public function getTitre(){
            return $this->titre;
        }
         
        public function getConnex(){
            return $this->connex;
        }

        public function ajouter(){
            $requete=$this->connex->prepare("INSERT INTO livre VALUES(null,:code1,:code2,:titre)");
            $requete->execute(array(
                "code1"=>$this->getCode1(),
                "code2"=>$this->getCode2(),
                "titre"=>$this->getTitre()
            ));
        }

        public function modifier($reference){
            $requete=$this->connex->prepare("UPDATE livre SET code1='{$this->getCode1()}', code2='{$this->getCode2()}', titre='{$this->getTitre()}' WHERE reference={$reference}");
            $requete->execute();
        }
        
        public function afficheTous(){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, auteur.nom_auteur as auteur,
            editeur.nom_editeur as editeur, editeur.date_edition as date_edition, categorie.genre as genre, theme.sujet as sujet, 
            livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
           emplacement.nom_rayon as rayon, rangement.nom_rangement as rangement FROM livre
           INNER JOIN placer ON placer.reference=livre.reference
           INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
           
           INNER JOIN ranger ON ranger.reference=livre.reference
           INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
           INNER JOIN estattribuer ON estattribuer.reference=livre.reference
           INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
           INNER JOIN appartenir ON appartenir.reference=livre.reference
           INNER JOIN theme ON theme.id_theme=appartenir.id_theme
           INNER JOIN editer ON editer.reference=livre.reference
           INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
           INNER JOIN ecrire ON ecrire.reference=livre.reference
           INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur
           ORDER BY livre.titre");
           $sql->execute();
           while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
               echo '<tr class="pb-0">
                  
                   <td class="pb-0">'.$livre["titre"].'</td>
                   <td class="pb-0">'.$livre["auteur"].'</td>
                   <td class="pb-0">'.$livre["editeur"].'</td>
                   <td class="pb-0">'.$livre["date_edition"].'</td>
                   <td class="pb-0">'.$livre["genre"].'</td> 
                   <td class="pb-0">'.strtolower($livre["sujet"]).'</td>
                    <td class="pb-0">'.$livre["code1"].'</td>
                    <td class="pb-0">'.$livre["code2"].'</td>
                    <td class="pb-0">'.$livre["rayon"].'</td>
                    <td class="pb-0">'.$livre["rangement"].'</td>
        
                     <td class="pb-0"><form method="post" action="page.php"><button name="supprimer" id="btn-suppr" value='.$livre["refer"].'><img src="vue/delete.png" width="40" style="background-color:silver"></button></form></td>
                     <td class="pb-0"><form method="post" action="formModifier.php?editer='.$livre["refer"].'"><button name="modifier" id="btn-suppr" "><img src="vue/edit.png" width="40" style="background-color:silver" border="0px"></button></form></td>
 
                    </tr>';
             }
        }

        public function afficheTousa(){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
             editeur.nom_editeur as editeur, auteur.nom_auteur as auteur, theme.sujet as sujet, categorie.genre as genre,
             emplacement.nom_rayon as rayon, rangement.nom_rangement as rangement, 
             editeur.date_edition as date_edition FROM livre
            INNER JOIN placer ON placer.reference=livre.reference
            INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
            INNER JOIN classer ON classer.reference=livre.reference
            INNER JOIN classement ON classement.id_classement=classer.id_classement
            INNER JOIN ranger ON ranger.reference=livre.reference
            INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
            INNER JOIN estattribuer ON estattribuer.reference=livre.reference
            INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
            INNER JOIN appartenir ON appartenir.reference=livre.reference
            INNER JOIN theme ON theme.id_theme=appartenir.id_theme
            INNER JOIN editer ON editer.reference=livre.reference
            INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
            INNER JOIN ecrire ON ecrire.reference=livre.reference
            INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur");
            $sql->execute();
            while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr class="pb-0">
                   
                    <td class="pb-0">'.$livre["titre"].'</td>
                    <td class="pb-0">'.$livre["auteur"].'</td>
                    <td class="pb-0">'.$livre["editeur"].'</td>
                    <td class="pb-0">'.$livre["date_edition"].'</td>
                    <td class="pb-0">'.$livre["genre"].'</td> 
                    <td class="pb-0">'.strtolower($livre["sujet"]).'</td>
                     <td class="pb-0">'.$livre["code1"].'</td>
                     <td class="pb-0">'.$livre["code2"].'</td>
                     <td class="pb-0">'.$livre["rayon"].'</td>
                     <td class="pb-0">'.$livre["rangement"].'</td>
                    </tr>';
             }
        }

        function afficherParCat($genre){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
            editeur.nom_editeur as editeur, auteur.nom_auteur as auteur, theme.sujet as sujet, categorie.genre as genre, rangement.nom_rangement as rangement,
            emplacement.nom_rayon as rayon, editeur.date_edition as date_edition FROM livre 
           INNER JOIN placer ON placer.reference=livre.reference
           INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
           
           INNER JOIN ranger ON ranger.reference=livre.reference
           INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
           INNER JOIN estattribuer ON estattribuer.reference=livre.reference
           INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
           INNER JOIN appartenir ON appartenir.reference=livre.reference
           INNER JOIN theme ON theme.id_theme=appartenir.id_theme
           INNER JOIN editer ON editer.reference=livre.reference
           INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
           INNER JOIN ecrire ON ecrire.reference=livre.reference
           INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur
            WHERE categorie.id_categorie={$genre}
            ORDER BY livre.titre ");
            $sql->execute();
            while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr class="pb-0">
                   
                    <td class="pb-0">'.$livre["titre"].'</td>
                    <td class="pb-0">'.$livre["auteur"].'</td>
                    <td class="pb-0">'.$livre["editeur"].'</td>
                    <td class="pb-0">'.$livre["date_edition"].'</td>
                    <td class="pb-0">'.$livre["sujet"].'</td>
                     <td class="pb-0">'.$livre["code1"].'</td>
                     <td class="pb-0">'.$livre["code2"].'</td>
                     <td class="pb-0">'.$livre["rayon"].'</td>
                     <td class="pb-0">'.$livre["rangement"].'</td>
                    </tr>';
             }
        }

           
      
        function afficherParEmp($nom_rayon){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
            editeur.nom_editeur as editeur, auteur.nom_auteur as auteur, theme.sujet as sujet, categorie.genre as genre, rangement.nom_rangement as rangement,
            emplacement.nom_rayon as rayon, editeur.date_edition as date_edition FROM livre 
           INNER JOIN placer ON placer.reference=livre.reference
           INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
           
           INNER JOIN ranger ON ranger.reference=livre.reference
           INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
           INNER JOIN estattribuer ON estattribuer.reference=livre.reference
           INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
           INNER JOIN appartenir ON appartenir.reference=livre.reference
           INNER JOIN theme ON theme.id_theme=appartenir.id_theme
           INNER JOIN editer ON editer.reference=livre.reference
           INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
           INNER JOIN ecrire ON ecrire.reference=livre.reference
           INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur
           WHERE emplacement.id_rayon={$nom_rayon}");
            $sql->execute();
            while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr class="pb-0">
                   
                    <td class="pb-0">'.$livre["titre"].'</td>
                    <td class="pb-0">'.$livre["auteur"].'</td>
                    <td class="pb-0">'.$livre["editeur"].'</td>
                    <td class="pb-0">'.$livre["date_edition"].'</td>
                    <td class="pb-0">'.$livre["genre"].'</td> 
                    <td class="pb-0">'.$livre["sujet"].'</td>
                     <td class="pb-0">'.$livre["code1"].'</td>
                     <td class="pb-0">'.$livre["code2"].'</td>
                     <td class="pb-0">'.$livre["rangement"].'</td>
                    
                    
 
                    </tr>';
             }
        }


       
        

        public function idDernier(){
            $id=$this->connex->prepare("SELECT MAX(reference) FROM livre");
            $id->execute();
            while($requete=$id->fetch()){
                return $requete['MAX(reference)'];
             }
        }

        public function supprimer($reference){
            $sql=$this->connex->prepare("DELETE FROM livre WHERE reference={$reference}");
            $sql->execute();
        }

        public function recIdParCategorie($idcat){
            $sql = $this->connexion->prepare("SELECT * FROM livre WHERE id_categorie={$idcat}");
            $sql->execute();
            while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo $livre["id_livre"];
             }
        }

        public function recupererParId($reference, $table){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
            editeur.nom_editeur as editeur, editeur.date_edition as date_edition, auteur.nom_auteur as auteur, theme.sujet as sujet, categorie.genre as genre, rangement.nom_rangement as rangement,
            emplacement.nom_rayon as rayon FROM livre 
           INNER JOIN placer ON placer.reference=livre.reference
           INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
           
           INNER JOIN ranger ON ranger.reference=livre.reference
           INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
           INNER JOIN estattribuer ON estattribuer.reference=livre.reference
           INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
           INNER JOIN appartenir ON appartenir.reference=livre.reference
           INNER JOIN theme ON theme.id_theme=appartenir.id_theme
           INNER JOIN editer ON editer.reference=livre.reference
           INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
           INNER JOIN ecrire ON ecrire.reference=livre.reference
           INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur WHERE livre.reference={$reference}");
            $sql->execute();
            while($livre = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo $livre[$table];
             }
        }
        public function rechercher($titre){
            $sql = $this->connex->prepare("SELECT  livre.titre as titre, livre.code1 as code1, livre.code2 as code2, livre.reference as refer,
            editeur.nom_editeur as editeur, editeur.date_edition as date_edition, auteur.nom_auteur as auteur, theme.sujet as sujet, categorie.genre as genre, rangement.nom_rangement as rangement,
            emplacement.nom_rayon as rayon FROM livre 
           INNER JOIN placer ON placer.reference=livre.reference
           INNER JOIN emplacement ON emplacement.id_rayon=placer.id_rayon
           
           INNER JOIN ranger ON ranger.reference=livre.reference
           INNER JOIN rangement ON rangement.id_rangement=ranger.id_rangement
           INNER JOIN estattribuer ON estattribuer.reference=livre.reference
           INNER JOIN categorie ON categorie.id_categorie=estattribuer.id_categorie
           INNER JOIN appartenir ON appartenir.reference=livre.reference
           INNER JOIN theme ON theme.id_theme=appartenir.id_theme
           INNER JOIN editer ON editer.reference=livre.reference
           INNER JOIN editeur  ON editeur.id_editeur=editer.id_editeur
           INNER JOIN ecrire ON ecrire.reference=livre.reference
           INNER JOIN auteur On auteur.id_auteur=ecrire.id_auteur
                WHERE livre.titre LIKE '%{$titre}%'
                OR livre.code1 LIKE '%{$titre}%'
                OR livre.code2 LIKE '%{$titre}%'
                OR auteur.nom_auteur LIKE '%{$titre}%'
                OR editeur.nom_editeur LIKE '%{$titre}%'
                OR theme.sujet LIKE '%{$titre}%'
                OR categorie.genre LIKE '%{$titre}%'
                OR emplacement.nom_rayon LIKE '%{$titre}%'
                OR rangement.nom_rangement LIKE '%{$titre}%'
                
                ORDER BY livre.titre");
            $sql->execute();
            while($recherche = $sql->fetch(PDO::FETCH_ASSOC)) {
                if($recherche){
                echo '<tr>
                <td>'.$recherche["titre"].'</td>
                <td>'.$recherche["code1"].'</td>
                <td>'.$recherche["code2"].'</td>
                <td>'.$recherche["rayon"].'</td>
                <td>'.$recherche["rangement"].'</td>
                <td>'.$recherche["auteur"].'</td>
                <td>'.$recherche["editeur"].'</td>
                <td>'.$recherche["date_edition"].'</td>
                <td>'.$recherche["genre"].'</td>
                <td>'.$recherche["sujet"].'</td>
               
            
                </tr>';
            }
         } 
        }
          public function taille(){
            $sql = $this->connex->prepare("SELECT *  FROM livre ");
            $sql->execute();
            $livre = $sql->fetchAll();
            return count($livre);
        }

    }
?>