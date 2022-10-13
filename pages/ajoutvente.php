<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $nomedic=isset($_POST['nomedic'])?$_POST['nomedic']:"";
    $typmedic=isset($_POST['typmedic'])?$_POST['typmedic']:"";
    $quantite=isset($_POST['quantite'])?$_POST['quantite']:"";
    $conditionnement=isset($_POST['conditionnement'])?$_POST['conditionnement']:"";
    $prixmed=isset($_POST['prixmed'])?$_POST['prixmed']:"";
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:"";
    

    $requete="INSERT INTO vente(nomedic,typmedic,quantite,conditionnement,prixmed,idutilisateur) VALUES(?,?,?,?,?,?)";
    $params=array($nomedic,$typmedic,$quantite,$conditionnement,$prixmed,$idutilisateur);
    
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:vente.php');

?>