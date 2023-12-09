<?php
//connexion au serveur
	$connexion  = mysqli_connect('localhost','root','') or die ("Erreur de la connexion au serveur");
	//connexion database
	$db = mysqli_select_db($connexion,'bdemplacement') or die("Erreur selectionner de la base de donnees");
?>