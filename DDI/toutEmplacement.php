<?php
    require("ConnexBase.php");
    include_once("livre.php");
    include_once("auteur.php");
    include_once("editeur.php");    
    include_once("categorie.php");
    include_once("appartenir.php");
    include_once("ecrire.php");
    include_once("emplacement.php");
    include_once("rangement.php");


    $livre = new Livre();
    $auteur = new Auteur();
    $editeur = new Editeur();
    $categorie = new Categorie();
    $appartenir = new Appartenir();
    $ecrire = new Ecrire();
    $emplacement = new Emplacement();
    $rangement=new Rangement();
    $idempl=1;
    $nom_rayon="rayon 1";

    if(isset($_POST['trier'])){ 
        $nom_rayon=$_POST['cat_nom_rayon'];
        $idempl=(int) $emplacement->recupereId($nom_rayon);
    }
    $assure="";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/pro.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery.min.js"></script>
</head>
<body class="bg-secondary">
    <?php include_once('nav.php');?>
    <div class="container" >
                <form action="" method="post">
                <select name="cat_nom_rayon" id="" class="custom-select custom-select-lg mb-3 ">
                    <?php echo $emplacement->afficherTri();?>
                </select>
                <button name="trier" class="btn btn-info">Trier</button>
            </form>
        <div class="cont2">
        <h3>Livres dans le <strong><?php echo $nom_rayon;?></strong><span class="float-right" id="taille"></span></h3>
            <table class="table">
                <thead>
                <tr>
                     
                     <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>A.Ed</th>
                    <th>Categorie</th>
                    <th>Theme</th>
                    <th>Cote1</th>
                    <th>Cote2</th>
                    <th>Rangée</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php   if($idempl==0){
                echo $livre->afficheTousa();
                }else{
                    echo $livre->afficherParEmp($idempl);
                }
                ?>
                
                </tbody>
            </table>
        </div>
    </div>
    <script>
$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
    $("#myAlert").on('close.bs.alert', function(){
        alert('The alert message is about to be closed.');
    });
});
document.getElementById('taille').innerHTML = "Total : " +document.querySelectorAll('tr.pb-0').length;
</script>
</body>
</html>
