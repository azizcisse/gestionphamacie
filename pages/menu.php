<?php
    require_once('identification.php');
   
?>
<nav class="navbar navbar-expand-sm bg-default navbar-fixed-top">
<div class="container-fluid justify-content-start">  
 <div class="navbar-header">
 <a href="accueil.php" class="logo me-auto"><img src="../assets/img/Cap.PNG" alt="" height="50" width="200" class="navbar-brand btn btn-danger mr-5"></a>
 <a href="accueil.php" class="navbar-brand btn btn-success mr-5">Gestion Pharmacie</a>
 </div>
<ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link btn btn-success mr-3" href="medicament.php">Médicament</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-success mr-3" href="vente.php">Vente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-success mr-3" href="echange.php">Echange</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-success mr-3" href="bon.php">Bon de Commande</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-success mr-5" href="utilisateur.php">Utilisateur</a>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right mr-5">
      <li><a class="btn btn-info mr-5" href="#"><span class="glyphicon glyphicon-user"></span><?php echo ' '.$_SESSION['utilisateur']['login']?>&nbsp</a></li>
      <li><a class="btn btn-danger" href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp Déconexion</a></li>
    </ul>
</div>
</nav>