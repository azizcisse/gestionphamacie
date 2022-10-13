<?php   
       require_once('identification.php');
       require_once("connexiondb.php");
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
  <script src="../js/monjs.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
  
</head>
<body>


<div class="container editpwd-page">
    <h1 class="text-center">Changement de mot de passe</h1>

    <h2 class="text-center"> Compte :<?php echo $_SESSION['utilisateur']['login'] ?>    </h2>

    <form class="form-horizontal" method="post" action="updatepwd.php">


        <!-- ***************** Début Ancien mot de passe  ***************** -->
        <div class="input-container">
            <input class="form-control oldpwd"
                   type="password"
                   name="oldpwd"
                   autocomplete="new-password"
                   placeholder="Taper votre Ancien Mot de passe"
                   required>
            <i class="fa fa-eye fa-2x show-old-pwd clickable"></i>
        </div>


        <!-- ***************** Fin Ancien mot de passe ***************** -->

        <!--  *****************Début Nouveau  mot de passe  ***************** -->

        <div class="input-container">
            <input minlength=4
                    class="form-control newpwd"
                    type="password"
                    name="newpwd"
                    autocomplete="new-password"
                    placeholder="Taper votre Nouveau Mot de passe"
                    required>
            <i class="fa fa-eye fa-2x show-new-pwd clickable"></i>

        </div>
        <!--  *****************  Fin Nouveau  mot de passe   ***************** -->

        <!--  ***************** start submit field  ***************** -->

        <input
                type="submit"
                value="Enregistrer"
                class="btn btn-primary btn-block"/>

        <!--   ***************** end submit field  ***************** -->

    </form>
</div>

</body>
</html>