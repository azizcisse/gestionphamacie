<?php
    require_once('identification.php');
    require_once('connexiondb.php');
    
    $numerobon=isset($_POST['numerobon'])?$_POST['numerobon']:"";
    $nomboncom=isset($_POST['nomboncom'])?$_POST['nomboncom']:"";
    $quantitecommande=isset($_POST['quantitecommande'])?$_POST['quantitecommande']:"";
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:"";
    

    $requete="INSERT INTO boncommande(numerobon,nomboncom,quantitecommande,idutilisateur) values(?,?,?,?)";
    $params=array($numerobon,$nomboncom,$quantitecommande,$idutilisateur);

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:bon.php');

?>