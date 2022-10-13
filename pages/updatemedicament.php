<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idmedica=isset($_POST['idmedica'])?$_POST['idmedica']:0;

    $photo=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$photo);

    $numeromed=isset($_POST['numeromed'])?$_POST['numeromed']:"";
    $nomedica=isset($_POST['nomedica'])?$_POST['nomedica']:"";
    $typemedica=isset($_POST['typemedica'])?$_POST['typemedica']:"";
    $quantite=isset($_POST['quantite'])?$_POST['quantite']:"";
    $prixpopulaire=isset($_POST['prixpopulaire'])?$_POST['prixpopulaire']:"";
    $conditionnement=isset($_POST['conditionnement'])?$_POST['conditionnement']:"";
    $dateexpiration=isset($_POST['dateexpiration'])?$_POST['dateexpiration']:"";
    $idutilisateur=isset($_POST['idutilisateur'])?$_POST['idutilisateur']:1;

    echo $photo ."<br>";
    echo $imageTemp;
    if(!empty($photo)){
        $requete="UPDATE medicament SET photo=?,numeromed=?,nomedica=?,typemedica=?,quantite=?,prixpopulaire=?,conditionnement=?,dateexpiration=?,idutilisateur=? WHERE idmedica=?";
        $params=array($photo,$numeromed,$nomedica,$typemedica,$quantite,$prixpopulaire,$conditionnement,$dateexpiration,$idutilisateur,$idmedica);
    }else{
        $requete="UPDATE medicament SET photo=?,numeromed=?,nomedica=?,typemedica=?,quantite=?,prixpopulaire=?,conditionnement=?,dateexpiration=?,idutilisateur=? WHERE idmedica=?";
        $params=array($photo,$numeromed,$nomedica,$typemedica,$quantite,$prixpopulaire,$conditionnement,$dateexpiration,$idutilisateur,$idmedica);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:medicament.php');

?>