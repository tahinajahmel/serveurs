<?php
    require("ConnexBase.php");
    include_once("livre.php");
    include_once("auteur.php");
    include_once("editeur.php");    
    include_once("categorie.php");
    include_once("appartenir.php");
    include_once("ecrire.php");
    include_once("emplacement.php");
    include_once("editer.php");
    include_once("estattribuer.php");

    
    $livre = new Livre();
    $auteur = new Auteur();
    $editeur = new Editeur();
    $categorie = new Categorie();
    $appartenir = new Appartenir();
    $ecrire = new Ecrire();
    $emplacement = new Emplacement();
    $editer = new Editer();
    $estattribuer= new Estattribuer();

    session_start();
    $assure="";
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/pro.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body class="bg-secondary">
    <?php include_once('nav.php');?>
   
    <br>
    <form class="form-inline" action="formRecherche.php" method="post">
    <input class="form-control mr-sm-2" type="text" placeholder="Rechercher un livre" name="titre" required>
    <button class="btn btn-success"  name="rchrch" >Chercher</button>
  </form>

    <div class="container">
    <?php echo $assure;?>
    <h3 >Liste de tous les livres : <span class="float-right" id="taille">Total : <?php echo $livre->taille();?> </span></h3> <br/>
            <table class="table">
                <thead >
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>A.Ed</th>
                    <th>Categorie</th>
                    <th>Theme</th>
                    <th>Cote1</th>
                    <th>Cote2</th>
                    <th>Rayon</th>
                    <th>Rangée</th>

                </tr>
                </thead>
                <tbody>
                <?php echo $livre->afficheTousa();?>
                </tbody>
            </table>
    </div>

        
    <script>
            function hide(){
                document.getElementById('myAlert').style.display="block";
            }

            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
              
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)  
                });
            });
            });
        </script>
</body>
</html>