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
    $emplacement = new Emplacement();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/pro.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body class="bg-secondary">
    <?php include_once('nav.php');
       
    ?>
     
   
    <div class="container">
            <table class="table">
                <thead >
                <tr>
                <th>Titre</th>
                    <th>Cote1</th>
                    <th>Cote2</th>
                    <th>Rayon</th>
                    <th>Rangée</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>A.Ed</th>
                    <th>Categorie</th>
                    <th>Theme</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_POST["rchrch"])){
                        extract($_POST);    
                        if ($livre->rechercher($titre)==null) {
                        ?>
                              <div class="alert alert-success">
                        <strong><?php echo "Résultats correspondants ";?></strong>
                        
                     </div>
                
                        <?php
                                                             }
                                                 }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
});

</script>
</body>
</html>