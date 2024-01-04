<?php
if(isset($_POST['oui'])){
    session_start();
	session_destroy();
    
	header("location:TousLivre.php");
    exit();
}
if (isset($_POST['non'])) {
    header("location:page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="card bg-info text-white mx-25 my-25">
    <div class="card-body">
        Voulez vraiment se deconnecter?
        <form action="" method="post">
            <button name="oui" class="btn btn-danger">Oui</button>
            <button name="non" class="btn btn-primary">Non</button>
        </form>
    </div>
  </div>
    
</body>
</html>