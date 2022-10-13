<?php
require_once 'identification.php';
require_once 'connexiondb.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page de Connexion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
  <script async src='https://stackwhats.com/pixel/af9e6c99598d3c88e1a50e8ab38006'></script>
</head>
<body>
  
<?php include 'menu.php'; ?>


<div class="container col-md-12">
  <div class="panel panel-danger margetop60">
    <div class="panel-heading text-center"><h2>Gestion Pharmacie Khadija</h2></div>
      <div class="panel-body">
 <div class="card-group">
  <div class="card mr-5" style="width:200px">
  <img class="card-img-top" src="../assets/img/utilisateurs.PNG" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Gestion des Utilisateurs</h4>
    <a href="utilisateur.php" class="btn btn-success stretched-link">Utilisateurs</a>
  </div>
</div>
<div class="card mr-5" style="width:300px">
  <img class="card-img-top" src="../assets/img/medicaments.PNG" alt="Card image">
  <div class="card-body">
    <a href="medicament.php" class="btn btn-success stretched-link">Gestion des Médicaments</a>
  </div>
</div>
<div class="card mr-5" style="width:200px">
  <img class="card-img-top" src="../assets/img/vente.JPG" alt="Card image">
  <div class="card-body">
    <a href="vente.php" class="btn btn-success stretched-link">Gestion des Ventes</a>
  </div>
</div>
<div class="card mr-5" style="width:100px">
  <img class="card-img-top" src="../assets/img/echange.jpg" alt="Card image">
  <div class="card-body">
    <a href="echange.php" class="btn btn-success stretched-link">Gestion des Echanges</a>
  </div>
</div>
<div class="card mr-5" style="width:200px">
  <img class="card-img-top" src="../assets/img/bon.jfif" alt="Card image">
  <div class="card-body">
    <a href="bon.php" class="btn btn-success stretched-link">Gestion des Bons de Commandes</a>
  </div>
</div>
   
  </div>
  </div>
 </div>
</div>
 
</body>
</html>