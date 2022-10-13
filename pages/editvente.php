<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idvente=isset($_GET['idvente'])?$_GET['idvente']:0;
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:1;

    $requete="SELECT * FROM vente where idvente=$idvente";
    $requeteuT="SELECT * FROM utilisateur"; 
     
    $resultatuT=$pdo->query($requeteuT);
    $resultat=$pdo->query($requete);
    $vente=$resultat->fetch();

    $nomedic=$vente['nomedic'];
    $typmedic=$vente['typmedic'];
    $quantite=$vente['quantite'];
    $conditionnement=$vente['conditionnement'];
    $prixmed=$vente['prixmed'];
    $idutilisateur=$vente['idutilisateur']; 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modification des ventes</title>
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
                <div class="panel-heading">Modification des ventes :</div>
                <div class="panel-body">
                    <form method="post" action="updatevente.php" class="form"  enctype="multipart/form-data">  
                    <div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="idvente" class="form-control" value="<?php echo $idvente?>"/>
                        </div>                 
                        <div class="form-group">
                             <label for="nomedic">Nom Médicament :</label>
                            <input type="text" name="nomedic" placeholder="Nom" class="form-control" value="<?php echo $nomedic?>"/>
                        </div>
                        <div class="form-group">
                        <label for="typmedic">Type de Médicament :</label>
			            <select name="typmedic" class="form-control" id="typmedic" value="<?php echo $typmedic?>">
                        <option > Les types </option>
                            <?php if($typemedic==="Les types")echo "checked" ?> 
                            <option > Enfant </option>
                            <?php if($typemedic==="Enfant")echo "checked" ?> 
                            <option > Adulte </option>
                            <?php if($typemedic==="Adulte")echo "checked" ?> 
                            <option > Agé </option>
                            <?php if($typemedic==="Agé")echo "checked" ?> 
			            </select>
                        </div>
                        <div class="form-group">
                             <label for="quantite">Quantité :</label>
                            <input type="number" name="quantite" placeholder="Quantite" class="form-control" step="10" min="0" max="100000" value="<?php echo $quantite?>" required>
                                 <span class="validity"></span>
                        </div>  
                        <div class="form-group">
                        <label for="conditionnement">Conditionnement :</label>
			            <select name="conditionnement" class="form-control" id="conditionnement" value="<?php echo $conditionnement?>">
                            <option >Heure de consommation </option>
                            <?php if($typmedic==="Heure de consommation")echo "checked" ?>
                            <option > Matin </option>
                            <?php if($typmedic==="Matin")echo "checked" ?>
                            <option > Midi </option>
                            <?php if($typmedic==="Midi")echo "checked" ?>
                            <option > Soir </option>
                            <?php if($typmedic==="Soir")echo "checked" ?>
			            </select>
                        </div>
                        <div class="form-group">
                             <label for="prixmed">Prix Médicament :</label>
                            <input type="number" name="prixmed" placeholder="Prix Médicament" class="form-control" step="10" min="0" max="100000" value="<?php echo $prixmed?>" required>
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