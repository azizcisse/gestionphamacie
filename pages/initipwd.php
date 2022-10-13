<?php
require_once('connexiondb.php');

//require_once('fonctions.php');

if (isset($_POST['email']))
    $email = $_POST['email'];
else
    $email = "";

$utilisateur = ($email);

if($utilisateur != null) {
    $idutilisateur = 'idutilisateur';
    $requete = $pdo->prepare("UPDATE utilisateur SET password='0000' WHERE idutilisateur=$idutilisateur");
    $requete->execute();

    $to = $email;

    $objet = "Initialisation de  votre mot de passe";

    $content = "Votre nouveau mot de passe est 0000, veuillez le modifier à la prochine ouverture de session";

    $entetes = "From : Pharmacie-Khadija" . "\r\n" . "CC: ziza6c78@gmail.com";

    mail($to, $objet, $content, $entetes);

    $erreur = "non";

    $msg = "Un message contenant votre nouveau mot de passe a été envoyé sur votre adresse Email.";

} else {
    $erreur = "oui";

    $msg = "<strong>Erreur!</strong> L'Email est incorrecte!!!";

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Initialisation du mot de passe</title>
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
<div class="container col-md-6 col-md-offset-3">
    <br>
    <div class="panel panel-primary ">
        <div class="panel-heading">Initiliser votre mot de passe</div>
        <div class="panel-body">
            <form method="post" class="form">

                <div class="form-group">
                    <label class="control-label">
                        Veuillez saisir votre email de récuperation
                    </label>

                    <input type="email" name="email" class="form-control"/>
                </div>

                <button type="submit" class="btn btn-success">Initialiser le mot de passe</button>

            </form>
        </div>
    </div>


    <div class="text-center">

        <?php

        if ($erreur == "oui") {

            echo '<div class="alert alert-danger">' . $msg . '</div>';

            header("refresh:60;url=initipwd.php");

            exit();
        } else if ($erreur == "non") {

            echo '<div class="alert alert-success">' . $msg . '</div>';

            header("refresh:5;url=login.php");

            exit();
        }

        ?>

    </div>


</div>
</body>
</html>



