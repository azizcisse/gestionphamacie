<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:0;
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $age=isset($_POST['age'])?$_POST['age']:"";
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:"";
    $type=isset($_POST['type'])?$_POST['type']:"";
    $login=isset($_POST['login'])?$_POST['login']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
   
    $requete="UPDATE utilisateur SET prenom=?,nom=?,age=?,sexe=?,type=?,login=?,email=? WHERE idutilisateur=? ";
    $params=array($prenom,$nom,$age,$sexe,$type,$login,$email,$idutilisateur);
    
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:utilisateur.php');

?>
