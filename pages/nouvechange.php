<?php
    require_once('identification.php');
    require_once('connexiondb.php');
   
    $requeteE="SELECT * FROM echange";
    $requeteuT="SELECT * FROM utilisateur"; 

    $resultatuT=$pdo->query($requeteuT);
    $resultatE=$pdo->query($requeteE);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Enregistrement des nouvelles Echanges</title>
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
                <div class="panel-heading">Enregistrement des Echanges :</div>
                <div class="panel-body">
                    <form method="post" action="ajoutechange.php" class="form"  enctype="multipart/form-data">                   
                        <div class="form-group">
                             <label for="nompharmacie">Nom Pharmacie :</label>
                            <input type="text" name="nompharmacie" placeholder="Nom Pharmacie" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="medicament">Nom Médicament :</label>
                            <input type="text" name="medicament" placeholder="Médicament" class="form-control" />
                        </div>
                        <div class="form-group">
                        <label for="typechange">Type de Médicament :</label>
			            <select name="typechange" class="form-control" id="typechange">
                            <option > Tous les types </option>
                            <option > Enfant </option>
                            <option > Adulte </option>
                            <option > Agé </option>
			            </select>
                        </div> 
                        <div class="form-group">
                             <label for="quantite">Quantité :</label>
                            <input type="number" name="quantite" placeholder="Quantite" class="form-control" step="10" min="0" max="100000" required>
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