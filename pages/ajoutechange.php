<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $nompharmacie=isset($_POST['nompharmacie'])?$_POST['nompharmacie']:"";
    $medicament=isset($_POST['medicament'])?$_POST['medicament']:"";
    $typechange=isset($_POST['typechange'])?$_POST['typechange']:"";
    $quantite=isset($_POST['quantite'])?$_POST['quantite']:"";
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:"";
   

    $requete="INSERT INTO echange(nompharmacie,medicament,typechange,quantite,idutilisateur) values(?,?,?,?,?)";
    $params=array($nompharmacie,$medicament,$typechange,$quantite,$idutilisateur);

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:echange.php');

?>