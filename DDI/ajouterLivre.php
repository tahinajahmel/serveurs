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
    include_once("page.php");
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
    $valider="";

    if(isset($_POST['insererLivre'])){
        extract($_POST);
        $livre->setCode1($code1);
        $livre->setCode2($code2);
        $livre->setTitre($titre);
        $livre->ajouter();

        $editeur->setNom_editeur($nom_editeur);
        $editeur->setDate_edition($date_edition);
        $editeur->ajouter();

        $auteur->setNom_auteur($nom_auteur);
        $auteur->ajouter();

        $theme->setTheme($sujet);
        $theme->ajouter();

        $ecrire->setReference((int)$livre->idDernier());
        $ecrire->setId_auteur((int)$auteur->idDernier());
        $ecrire->ajouter();

        $editer->setId_editeur((int)$editeur->idDernier());
        $editer->setReference((int)$livre->idDernier());
        $editer->ajouter();

        $appartenir->setReference((int)$livre->idDernier());
        $appartenir->setId_theme((int)$theme->idDernier());
        $appartenir->ajouter();

        $estattribuer->setReference((int)$livre->idDernier());
        $estattribuer->setId_categorie((int)$categorie->recupereId($genre));
        $estattribuer->ajouter();

        $placer->setReference((int)$livre->idDernier());
        $placer->setId_rayon((int)$emplacement->recupereId($nom_rayon));
        $placer->ajouter();

       
        $ranger->setReference((int)$livre->idDernier());
        $ranger->setId_ranger((int)$nom_rangement);
        $ranger->ajouter();

        $valider="Livre inserer avec succes!!";
    }

    if(isset($_POST['ajouterRayon'])){
        extract($_POST);
        $emplacement->setNom_rayon($newRayon);
        $emplacement->ajouter();
    }

    if(isset($_POST['ajouterCategorie'])){
        extract($_POST);
        $categorie->setGenre($newCategorie);
        $categorie->ajouter();
    }

    if(isset($_POST['ajouterRanger'])){
        extract($_POST);
        $rangement->setNom_ranger($newRanger);
        $rangement->ajouter();
    }

    if(isset($_POST['ajouterSujet'])){
        extract($_POST);
        $theme->setClassement($newTheme);
        $theme->ajouter();
    }
?> 

