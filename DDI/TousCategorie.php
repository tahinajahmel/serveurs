<?php
    require("ConnexBase.php");
    include_once("livre.php");
    include_once("auteur.php");
    include_once("editeur.php");    
    include_once("categorie.php");
    include_once("appartenir.php");
    include_once("ecrire.php");
    include_once("emplacement.php");

    $livre = new Livre();
    $auteur = new Auteur();
    $editeur = new Editeur();
    $categorie = new Categorie();
    $appartenir = new Appartenir();
    $ecrire = new Ecrire();

    $idcat=1;
    $genre="Sciences agricoles";
    if(isset($_POST['trier'])){
        $genre=$_POST['cat_genre'];
        $idcat=(int) $categorie->recupereId($genre);
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
    <?php 
    include_once('nav.php');
    $cat="";
    ?>
        <div class="container-fluid mt-2"><br/>
            <form action="" id="formCategorie" method="post">
               <select name="cat_genre" class="custom-select custom-select-lg mb-3 ">
                    <?php echo $categorie->afficherTri();?>
                </select>
                <button class="btn btn-info w-15" name="trier">Trier</button>
            </form>
            <div class="cont2">
        <h3>Livres <strong><?php echo $genre;?></strong><span class="float-right" id="taille"></span></h3>
            <table class="table">
                <thead>
                <tr>
                   
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>A.Ed</th>
                    <th>Theme</th>
                    <th>Cote1</th>
                    <th>Cote2</th>
                    <th>Emplacement</th>
                    <th>Rangée</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php 
                if($idcat==0){
                echo $livre->afficheTousa();
                }else{
                    echo $livre->afficherParCat($idcat);
                }
                ?>
                
                </tbody>
            </table>
            
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