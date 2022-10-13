<?php
require_once('connexiondb.php');
session_start(); 
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page de Connexion</title>
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
 <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    
        <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                       
             <div class="panel panel-danger margetop60">
                <div class="panel-heading">Se Connecter :</div>
                <div class="panel-body">
                    <form method="post" action="seconnecter.php" class="form"> 
                    <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                    <?php } ?>                  
                        <div class="form-group">
                             <label for="login">Login :</label>
                            <input type="text" name="login" placeholder="login" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="password">Mot de Passe :</label>
                            <input type="password" name="password" placeholder="Mot de Passe" class="form-control" />
                        </div>                      
                        <button type="submit" class="btn btn-success mr-3"> 
                            <span class="glyphicon glyphicon-log-in"></span>
                              Se Connecter </button>

                        <button type="reset" class="btn btn-danger  mr-3"><a href="accueil.php"> 
                            <span class="glyphicon glyphicon-remove"></span>
                              Annuler </a></button>
                        
                              &nbsp;&nbsp;   
                    <p class="text-right p-5 mr-5">
                    <a class="btn btn-warning" href="initipwd.php">Mot de passe Oublié</a>

                    &nbsp;&nbsp;
                    <a class="btn btn-primary" href="nouvutilisateur.php">S'inscrire</a>
                   
                                    
                </p>          
    </form>
</div>

</body>
</html>