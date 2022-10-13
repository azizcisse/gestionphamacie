<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idboncommande=isset($_GET['idboncommande'])?$_GET['idboncommande']:0;
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:1;

    $requete="SELECT * FROM boncommande WHERE idboncommande=$idboncommande";
    $requeteuT="SELECT * FROM utilisateur"; 

    $resultatuT=$pdo->query($requeteuT);
    $resultat=$pdo->query($requete);
    $boncommande=$resultat->fetch();

    $numerobon=$boncommande['numerobon'];
    $nomboncom=$boncommande['nomboncom'];
    $quantitecommande=$boncommande['quantitecommande'];
    $idutilisateur=$boncommande['idutilisateur'];
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modification des Bons de Commandes</title>
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
                <div class="panel-heading">Modification des Bons de Commandes:</div>
                <div class="panel-body">
                    <form method="post" action="updatebon.php" class="form"  enctype="multipart/form-data">  
                    <div class="form-group">
                           <!-- <label for="id">id Bon Commande:</label>-->
                            <input type="hidden" name="idboncommande" class="form-control" value="<?php echo $idboncommande?>"/>
                        </div>  
                        <div class="form-group">
                             <label for="numerobon">Numéro Bon :</label>
                            <input type="number" name="numerobon" placeholder="Numéro Bon " class="form-control" value="<?php echo $numerobon?>"/>
                        </div>               
                        <div class="form-group">
                             <label for="nomboncom">Nom Du Bon De Commande :</label>
                            <input type="text" name="nomboncom" placeholder="Nom Du Bon De Commande" class="form-control" value="<?php echo $nomboncom?>"/>
                        </div>
                        <div class="form-group">
                             <label for="quantitecommande">Quantité Commande :</label>
                            <input type="number" name="quantitecommande" placeholder="Quantité Commande" class="form-control"  min="0" max="100000" value="<?php echo $quantitecommande?>" required>
                                 <span class="validity"></span>
                        </div> 
                        <div class="form-group">
                            <label for="idutilisateur">Utilisateur:</label>
				            <select name="idutilisateur" class="form-control" id="idutilisateur">
                              <?php while($utilisateur=$resultatuT->fetch()) { ?>
                                <option value="<?php echo $utilisateur['idutilisateur'] ?>"
                                         <?php if($idutilisateur===$utilisateur['idutilisateur']) echo "selected" ?>> 
                                    <?php echo $utilisateur['prenom'] ?>
                                </option>
                              <?php }?>
				            </select>
                 <input type="submit" class="btn btn-primary" value="Enregistrer">
                 <input type="reset" class="btn btn-danger" value="Annuler">
    </form>
</div>

</body>
</html>