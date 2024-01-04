<?php
    include_once("livre.php");
    include_once("auteur.php");
    include_once("editeur.php");    
    include_once("categorie.php");
    include_once("appartenir.php");
    include_once("ecrire.php");
    include_once("emplacement.php");
    include_once("estattribuer.php");
    include_once("editer.php");
    include_once("theme.php");
    include_once("placer.php");
    include_once("ranger.php");
    include_once('rangement.php');
 
    
    $livre = new Livre();
    $auteur = new Auteur();
    $editeur = new Editeur();
    $categorie = new Categorie();
    $appartenir = new Appartenir();
    $ecrire = new Ecrire();
    $estattribuer = new Estattribuer();
    $theme=new Theme();
    $editer = new Editer();
    $emplacement = new Emplacement();
    $rangement = new Rangement();
    $ranger = new Ranger();
    $placer = new Placer();

    $valider="<center><h3>Veuillez remplir tous les champs</h3></center>";

    if(isset($_POST['modifierLivre'])){
        extract($_POST);

        $livre->setCode1($code1);
        $livre->setCode2($code2);
        $livre->setTitre($titre);
        $livre->modifier($_GET['editer']);
        

        $editeur->setNom_editeur($Nom_editeur);
        $editeur->setDate_edition($date_edition);
        $editeur->modifier((int) $editer->recupererId($_GET['editer']));

        $auteur->setNom_auteur($Nom_auteur);
        $auteur->modifier($ecrire->recupererId($_GET['editer']));

        $theme->setTheme($sujet);
        $theme->modifier($appartenir->recupererId($_GET['editer']));

        $estattribuer->setId_categorie($categorie->recupereId($genre));
        $estattribuer->modifier($_GET['editer']);
        
        $placer->setId_rayon($emplacement->recupereId($nom_rayon));
        $placer->modifier($_GET['editer']);


        $ranger->setId_ranger($nom_rangement);
        $ranger->modifier($_GET['editer']);
        
        $valider="Livre a été modifié avec succes!!";
        header('location:page.php');
      
  
    }

?> 
