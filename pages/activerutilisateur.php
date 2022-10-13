<?php
    require_once('identification.php');
    session_start();
    if(isset($_SESSION['utilisateur']) ){
      require_once('connexiondb.php');

    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;
    $etat=isset($_GET['etat'])?$_GET['etat']:0;
    
    if($etat==1)
        $newEtat=0;
        else 
        $newEtat=1;
   
    $requete="UPDATE utilisateur SET etat=? WHERE idutilisateur=? ";
    $params=array($newEtat,$idutilisateur);
    
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:login.php');
  }else {
    header('location:utilisateur.php');
 } 
?>
