<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idechange=isset($_GET['idechange'])?$_GET['idechange']:0;
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:1;

    $requete="SELECT * FROM echange where idechange=$idechange";
    $requeteuT="SELECT * FROM utilisateur"; 

    $resultatuT=$pdo->query($requeteuT);
    $resultat=$pdo->query($requete);
    $echange=$resultat->fetch();

    $nompharmacie=$echange['nompharmacie'];
    $medicament=$echange['medicament'];
    $typechange=$echange['typechange'];
    $quantite=$echange['quantite'];
    $idutilisateur=$echange['idutilisateur']; 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modification des Echanges</title>
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
                <div class="panel-heading">Modification des Echanges :</div>
                <div class="panel-body">
                    <form method="post" action="updatechange.php" class="form"  enctype="multipart/form-data">  
                    <div class="form-group">
                           <!-- <label for="id">id Echange:</label>-->
                            <input type="hidden" name="idechange" class="form-control" value="<?php echo $idechange?>"/>
                        </div> 
                        <div class="form-group">
                             <label for="nompharmacie">Nom de la Pharmacie :</label>
                            <input type="text" name="nompharmacie" placeholder="Nom de la Pharmacie" class="form-control" value="<?php echo $nompharmacie?>"/>
                        </div>                
                        <div class="form-group">
                             <label for="medicament">Médicament :</label>
                            <input type="text" name="medicament" placeholder="Médicament" class="form-control" value="<?php echo $medicament?>"/>
                        </div>
                        <div class="form-group">
                        <label for="typechange">Type d'Echange' :</label>
			            <select name="typechange" class="form-control" id="typechange" value="<?php echo $typechange?>">
                        <option > Les types d'Echange </option>
                            <?php if($typechange==="Les types d'Echange ")echo "checked" ?> 
                            <option > Enfant </option>
                            <?php if($typechange==="Enfant")echo "checked" ?> 
                            <option > Adulte </option>
                            <?php if($typechange==="Adulte")echo "checked" ?> 
                            <option > Agé </option>
                            <?php if($typechange==="Agé")echo "checked" ?> 
			            </select>
                        </div>
                        <div class="form-group">
                             <label for="quantite">Quantité :</label>
                            <input type="number" name="quantite" placeholder="Quantite" class="form-control" step="10" min="0" max="100000" value="<?php echo $quantite?>" required>
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