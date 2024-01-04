<?php
include_once('connexBase.php');
include_once('ajouterLivre.php');
include_once('rangement.php');
include_once("livre.php");
$livre=new Livre();
$rangement=new Rangement();
$theme=new theme();
$emplacement=new Emplacement();
session_start();
$id="modifier";
if($_SESSION["autoriser"]!="oui"){
  header('location:login.php');
  exit();
}

if(isset($_POST['supprimer'])){
  $livre->supprimer($_POST['supprimer']);
  $id="supprimer";
}

if(isset($_POST['supprSujet'])){
  $theme->supprimer($_POST['supprTheme']);
}

if(isset($_POST['supprCategorie'])){
  $categorie->supprimer($_POST['supprCategorie']);
}

if(isset($_POST['supprRangement'])){
  $rangement->supprimer($_POST['supprRangement']);
}

if(isset($_POST['supprEmplacement'])){
  $emplacement->supprimer($_POST['supprEmplacement']);
}

if(isset($_POST['insererLivre'])){
  $id="inserer";
}     
    ?>
<html>
  <head>
  <title> Page d'acceuil </title>
 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="vue/pro.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
 </head>
<body style ="background-color:silver">
               <!------MENU SECTION START-->
<div class="container-fluid">
<?php include_once('dec.php');?>
<br/>
  <?php 
  if(isset($_POST['insererLivre'])){
  echo
   '<div class="alert alert-success alert-dismissible" id="myAlert">
     <button type="button" class="close">&times;</button>
     <strong>Success!</strong>'. $valider.'.
   </div>';
   }; ?>
  <div class="d-flex justify-content-between mb-5">
    <div class="d-flex">
    <div class="dropdown mr-2">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      <img src="vue/add.png" width="32px"/>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addCategorie">Categorie</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addRayon">Rayon</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addRanger">Rangée</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addTheme">Thème</a>

    </div>
  </div>
  <!----------------------------------------------modalCateg☺rie------------------------------------------>

    <!-- The Modal -->
    <div class="modal fade" id="addCategorie">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une nouvelle categorie</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" placeholder="Nouvelle catégorie" name="newCategorie" class="form-control mb-2"/> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button  class="btn btn-primary" name="ajouterCategorie">Ajouter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
       </form>
      </div>
    </div>
  </div>
  <!----------------------------------------------modalrayon------------------------------------------>
       <!-- The Modal -->
       <div class="modal fade" id="addRayon">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une nouveau rayon</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" placeholder="Nouveau rayon" name="newRayon" class="form-control mb-2"/> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button  class="btn btn-primary" name="ajouterRayon">Ajouter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
       </form>
      </div>
    </div>
  </div>
    <!----------------------------------------------modalRanger------------------------------------------>

    <!-- The Modal -->
    <div class="modal fade" id="addRanger">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une nouvelle rangée</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" placeholder="Nouvelle rangée" name="newRanger" class="form-control mb-2"/> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button  class="btn btn-primary" name="ajouterRanger">Ajouter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
       </form>
      </div>
    </div>
  </div>
      <!----------------------------------------------modalTheme------------------------------------------>

    <!-- The Modal -->
    <div class="modal fade" id="addTheme">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un nouveau Theme</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" placeholder="Nouveau Theme" name="newTheme" class="form-control mb-2"/> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button  class="btn btn-primary" name="ajouterTheme">Ajouter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
       </form>
       <div>
       <table class="table">
        <tbody>
          <?=$theme->afficherListe();?>
        </tbody>
       </table>
      </div>
      </div>
    </div>
  </div>
  <!----------------------------------------------modalbout♂n------------------------------------------>
  <button type="button" class="btn btn-primary pb-0" data-toggle="modal" data-target="#myModal">
    Nouveau livre
  </button>
</div>
  <form class="form-inline" method="post">
    <input class="form-control sm-2" type="text" placeholder="Filtrer" id="myInput" name="titre" required>
    <!--button class="btn btn-success"  name="rechercher" >Chercher</!--button-->
  </form>
</div>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un livre</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" action="" method="post">
        <div class="modal-body">
              <input type="text" name="code1" placeholder="1er cote" class="form-control mb-2"/> 
              <input type="text" name="code2" placeholder="2em cote" class="form-control mb-2"/>
              <input type="text" name="titre" placeholder="Titre" class="form-control mb-2"/> 
              <input type="text" name="nom_editeur" placeholder="Editeur" class="form-control mb-2"/>
              <input type="text" name="nom_auteur" placeholder="Auteur" class="form-control mb-2"/> 
              Année d'edition<input type="number" name="date_edition" min="1800"  max="2030" value="2000"  /> <br/><br/>
               Categorie du livre <select name="genre" id="" class="custom-select mb-2" >
                 <?php echo $categorie->afficher();?>
               </select >
               Theme du livre <select name="sujet" id="" class="custom-select mb-2" >
                 <?php echo$theme->afficher();?>
               </select >
               Emplacement du livre <select name="nom_rayon" id="" class="custom-select mb-2">
                 <?php echo $emplacement->afficher();?>
               </select class="custom-select custom-select-lg mb-2">
               Rangement du livre<select name="nom_rangement" id="" class="custom-select mb-2">
                <?php echo $rangement->afficher();?>
               </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
       
          <button class="btn btn-primary" name="insererLivre">Ajouter</button>
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>
  <div>  <h3 class="float-right" id="taille"></h3></div>
            <table class="table">
                <thead >
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Editeur</th>
                  <th>A.Ed </th>
                  <th>Categorie</th>
                  <th>Theme</th>
                  <th>Cote1</th>
                  <th>Cote2</th>
                  <th>Rayon</th>
                  <th>Rangée</th>
                    
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                      $livre->afficheTous();
                      ?>
                </tbody>
             
            </div>
            
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
document.getElementById('taille').innerHTML = "Nombre total des livres : "+document.querySelectorAll('tr.pb-0').length;
</script>
</body>
</html>