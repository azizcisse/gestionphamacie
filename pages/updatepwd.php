<?php

require_once ('identification.php');

require_once ('connexiondb.php');

$idutilisateur=$_SESSION['utilisateur']['idutilisateur'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

$requete="SELECT * FROM utilisateur WHERE idutilisateur=$idutilisateur AND password='$oldpwd' ";

$resultat=$pdo->prepare($requete);

$resultat->execute();

$msg="";
$interval=3;
$url="login.php";

if($resultat->fetch()) {
    $requete = "UPDATE utilisateur SET password=? WHERE idutilisateur=?";
    $params = array($newpwd, $idutilisateur);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    $msg="<div class='alert alert-success' >
                <strong>Félicitation!</strong> Votre mot de passe est modifié avec succés
           </div>";

}else{
    $msg="<div class='alert alert-danger' >
            <strong>Erreur!</strong> L'ancien mot de passe est incorrect !!!!
           </div>";
    $url=$_SERVER['HTTP_REFERER'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Changement de mot de passe</title>
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
</head>
<body>
    <div class="container">
        <br><br>
        <?php
            echo  $msg;
            header("refresh:5;url=login.php");
        ?>

    </div>
</body>
</html>
