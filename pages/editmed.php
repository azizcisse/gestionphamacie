<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idmedica=isset($_GET['idmedica'])?$_GET['idmedica']:0;
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:1;

    $requete="SELECT * FROM medicament WHERE idmedica=$idmedica";
    $requeteuT="SELECT * FROM utilisateur"; 

    $resultatuT=$pdo->query($requeteuT);
    $resultat=$pdo->query($requete);
    $medicament=$resultat->fetch();

    $photo=$medicament['photo'];
    $numeromed=$medicament['numeromed'];
    $nomedica=$medicament['nomedica'];
    $typemedica=$medicament['typemedica'];
    $quantite=$medicament['quantite'];
    $prixpopulaire=$medicament['prixpopulaire'];
    $conditionnement=$medicament['conditionnement'];
    $dateexpiration=$medicament['dateexpiration'];
    $idutilisateur=$medicament['idutilisateur'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modification des médicaments</title>
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
                <div class="panel-heading">Enregistrement des médicaments :</div>
                <div class="panel-body">
                    <form method="post" action="updatemedicament.php" class="form"  enctype="multipart/form-data">       
                    <div class="form-group">
                             <!--<label for="idmedica">id du Médicament: <?php echo $idmedica?></label>-->
                            <input type="hidden" name="idmedica" class="form-control" value="<?php echo $idmedica ?>"/>
                        </div>           
                      <div class="form-group">
                        <label for="photo">Photo Médicament :</label>
                         <input type="file" name="photo" id="photo" class="form-control" value="<?php echo $photo?>" required/>
                        </div>
                        <div class="form-group">
                             <label for="numeromed">Numéro :</label>
                            <input type="number" name="numeromed" placeholder="Numéro" class="form-control"  min="0" max="100000" value="<?php echo $numeromed?>" required>
                                 <span class="validity"></span>
                        </div>
                        <div class="form-group">
                             <label for="nomedica">Nom Médicament :</label>
                            <input type="text" name="nomedica" placeholder="Nom" class="form-control" value="<?php echo $nomedica?>"/>
                        </div>
                        <div class="form-group">
                        <label for="typemedica">Type de Médicament :</label>
			            <select name="typemedica" class="form-control" id="typemedica" value="<?php echo $typemedica?>" >
                            <option > Les types </option>
                            <?php if($typemedica==="Les types")echo "checked" ?> 
                            <option > Enfant </option>
                            <?php if($typemedica==="Enfant")echo "checked" ?> 
                            <option > Adulte </option>
                            <?php if($typemedica==="Adulte")echo "checked" ?> 
                            <option > Agé </option>
                            <?php if($typemedica==="Agé")echo "checked" ?> 
			            </select>
                        </div>
                        <div class="form-group">
                             <label for="quantite">Quantité :</label>
                            <input type="number" name="quantite" placeholder="Quantite" class="form-control"  min="0" max="100000" value="<?php echo $quantite?>" required>
                                 <span class="validity"></span>
                        </div>                       
                        <div class="form-group">
                             <label for="prixpopulaire">Prix Populaire :</label>
                            <input type="number" name="prixpopulaire" placeholder="prixpopulaire" class="form-control"  min="0" max="100000" value="<?php echo $prixpopulaire?>" required>
                              <span class="validity"></span>
                        </div> 
                        <div class="form-group">
                        <label for="conditionnement">Conditionnement :</label>
			            <select name="conditionnement" class="form-control" id="conditionnement" value="<?php echo $conditionnement?>">
                            <option >Heure de consommation </option>
                            <?php if($typemedica==="Heure de consommation")echo "checked" ?>
                            <option > Matin </option>
                            <?php if($typemedica==="Matin")echo "checked" ?>
                            <option > Midi </option>
                            <?php if($typemedica==="Midi")echo "checked" ?>
                            <option > Soir </option>
                            <?php if($typemedica==="Soir")echo "checked" ?>
			            </select>
                        </div>
                        <div class="form-group">
                             <label for="dateexpiration">Date d'Expiration :</label>
                            <input type="date" name="dateexpiration" placeholder="Date d'Expiration" class="form-control" value="<?php echo $dateexpiration?>"/>
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
                        </div>   
                 <input type="submit" class="btn btn-primary" value="Enregistrer">
                 <input type="reset" class="btn btn-danger" value="Annuler">
    </form>
</div>

</body>
</html>