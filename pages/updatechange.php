<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idechange=isset($_POST['idechange'])?$_POST['idechange']:0;
    $nompharmacie=isset($_POST['nompharmacie'])?$_POST['nompharmacie']:"";
    $medicament=isset($_POST['medicament'])?$_POST['medicament']:"";
    $typechange=isset($_POST['typechange'])?$_POST['typechange']:"";  
    $quantite=isset($_POST['quantite'])?$_POST['quantite']:"";  
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:1;
  
    $requete="UPDATE echange SET nompharmacie=?,medicament=?,typechange=?,quantite=?,idutilisateur=? WHERE idechange=? ";
    $params=array($nompharmacie,$medicament,$typechange,$quantite,$idechange,$idutilisateur);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:echange.php');

?>