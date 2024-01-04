<?php
include_once('utilisateur.php');
  $utilisateur = new Utilisateur();
  session_start();
  if (isset($_POST['connx'])) {
    extract($_POST);
    $utilisateur->connexion($nom,$pass);
   
  }
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Utilisateur</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="vue/login.css"/>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
    </head>
    <body>
      
          <form method="post" class="modal-content animate" action="">
            <div class="imgcontainer">
              <h1 >  Zone admin</h1>
            </div>
           <p > Veuilliez  vous connecter s'il vous plait.</p>
            <div class="Load">
              <input type="text" placeholder="Nom admin" name="nom" >
              <input type="password" placeholder="Mot de pass" name="pass" >
            </div>

            <center>
              <button class="signconnex"type="submit" name="connx">Se connecter</button> 
              <label>
              <button class="signannuler"  type="reset" ><a href="tousLivre.php"> Annuler</a></button></center>
            <center>

          
          </form>
        
    </body>
</html>