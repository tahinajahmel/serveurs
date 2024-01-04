<?php 
    include_once("categorie.php");
    include_once("livre.php");
    include_once('rangement.php');
    include_once('emplacement.php');
    include_once('modifier.php');
    $livre=new Livre();
    $categorie=new Categorie();
    $emplacement=new Emplacement();
    $rangement=new Rangement();
    $reference=(int)$_GET['editer'];
?>
<html>
<title> Modification </title>
<head> <meta charset="utf-8">
<link rel="stylesheet" href="vue/cssstyle.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-3">
<form method="post" class="form1">
        <input type="text" placeholder="1er cote"  name="code1" value="<?php echo $livre->recupererParId($reference, "code1");?>" class="form-control mb-2"/>
        <input type="text" placeholder="2em cote"  name="code2" value="<?php echo $livre->recupererParId($reference, "code2");?>" class="form-control mb-2"/> 
        <input type="text" placeholder="Titre" name="titre" value="<?php echo $livre->recupererParId($reference, "titre");?>"class="form-control mb-2"/>
        <input type="text"  placeholder="Auteur"name="Nom_auteur" value="<?php echo $livre->recupererParId($reference, "auteur");?>"class="form-control mb-2"/>
        <input type="text"  placeholder="Editeur"name="Nom_editeur" value="<?php echo $livre->recupererParId($reference, "editeur");?>"class="form-control mb-2"/>
        <!--<input type="text" placeholder="Thème"name="sujet" value="<?php echo $livre->recupererParId($reference, "sujet");?>"class="form-control mb-2"/>!-->
        Thème<select name="sujet" id="" class="custom-select mb-2" >
        <option value=<?php echo $livre->recupererParId($reference, "sujet");?>><?php echo $livre->recupererParId($reference, "sujet");?></option>
                 <?php echo $theme->afficher();?>
               </select >
        Date d'edition<input type="number" name="date_edition" min="1800"  max="2030" value="<?php echo $livre->recupererParId($reference, "date_edition") ;?>"class="form-control mb-2"/>
        Genre du livre <select name="genre" id="" class="custom-select mb-2" >
        <option value=<?php echo $livre->recupererParId($reference, "genre");?>><?php echo $livre->recupererParId($reference, "genre");?></option>
                 <?php echo $categorie->afficher();?>
               </select >
               Emplacement du livre <select name="nom_rayon" id="" class="custom-select mb-2">
                <option value=<?php echo $livre->recupererParId($reference, "rayon");?>><?php echo $livre->recupererParId($reference, "rayon");?></option>
                 <?php echo $emplacement->afficher();?>
               </select class="custom-select custom-select-lg mb-2">
            
               Rangement <select name="nom_rangement" id="" class="custom-select mb-2">
               <option value=<?php echo $livre->recupererParId($reference, "rangement");?>><?php echo $livre->recupererParId($reference, "rangement");?></option>
                <?php echo $rangement->afficher();?>
               </select>
        <button class="btn btn-primary" name="modifierLivre">Enregistrer les modifications</button>
        <button   class="btn btn-danger" name="annuler">Annuler</button>

         
    </form>

</div>

</body>
</html>







