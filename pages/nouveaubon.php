<?php
    require_once('identification.php');
    require_once('connexiondb.php');
   
    $requeteB="SELECT * FROM boncommande";
    $requeteuT="SELECT * FROM utilisateur"; 

    $resultatuT=$pdo->query($requeteuT);
    $resultatB=$pdo->query($requeteB);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Enregistrement des nouveaux bon de commandes</title>
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
        <?php include("menu.php"); ?>
        
        <div class="container col-md-6 col-md-offset-3">
                       
             <div class="panel panel-danger margetop60">
                <div class="panel-heading">Enregistrement des Bons de commandes :</div>
                <div class="panel-body">
                    <form method="post" action="ajouterbon.php" class="form"  enctype="multipart/form-data">                   
                    <div class="form-group">
                             <label for="numerobon">Numéro Bon :</label>
                            <input type="number" name="numerobon" placeholder="Numéro Bon" class="form-control" min="0" max="100000" required>
                                 <span class="validity"></span>
                        </div>     
                    <div class="form-group">
                             <label for="nomboncom">Nom du Bon de Commande :</label>
                            <input type="text" name="nomboncom" placeholder="Nom du Bon de Commande" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="quantitecommande">Quantité Commande :</label>
                            <input type="number" name="quantitecommande" placeholder="Quantité Commande" class="form-control" min="0" max="100000" required>
                                 <span class="validity"></span>
                        </div>   
                        <div class="form-group">
                            <label for="idutilisateur">Utilisateur:</label>
				            <select name="idutilisateur" class="form-control" id="idutilisateur">
                              <?php while($utilisateur=$resultatuT->fetch()) { ?>
                                <option value="<?php echo $utilisateur['idutilisateur'] ?>"> 
                                    <?php echo $utilisateur['prenom'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>                  
                 <input type="submit" class="btn btn-primary" value="Enregistrer">
                 <input type="reset" class="btn btn-danger" value="Annuler">
    </form>
</div>

</body>
</html>