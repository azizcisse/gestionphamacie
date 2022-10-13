<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idboncommande=isset($_POST['idboncommande'])?$_POST['idboncommande']:0;
    $numerobon=isset($_POST['numerobon'])?$_POST['numerobon']:"";
    $nomboncom=isset($_POST['nomboncom'])?$_POST['nomboncom']:"";
    $quantitecommande=isset($_POST['quantitecommande'])?$_POST['quantitecommande']:"";
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:1;
  
    $requete="UPDATE boncommande SET numerobon=?,nomboncom=?,quantitecommande=?,idutilisateur=? WHERE idboncommande=? ";
    $params=array($numerobon,$nomboncom,$quantitecommande,$idboncommande,$idutilisateur);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:bon.php');

?>