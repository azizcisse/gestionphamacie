<?php
    require_once('identification.php');
    require_once("connexiondb.php");
    
  
    $nomedica=isset($_GET['nomedica'])?$_GET['nomedica']:"";
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;
    
     
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteuT="SELECT * FROM utilisateur";
    
    if($idutilisateur==0){
        $requete="SELECT idmedica,photo,numeromed,nomedica,typemedica,quantite,prixpopulaire,conditionnement,datecreation,dateexpiration,prenom 
                from utilisateur as u,medicament as e
                where u.idutilisateur=e.idutilisateur
                and nomedica like '%$nomedica%' 
                order by idmedica
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countM FROM medicament
                where nomedica like '%$nomedica%' ";
    }else{
        $requete="SELECT idmedica,photo,numeromed,nomedica,typemedica,quantite,prixpopulaire,conditionnement,datecreation,dateexpiration,prenom 
                from utilisateur as u,medicament as m
                where u.idutilisateur=m.idutilisateur
                and nomedica like '%$nomedica%'
                and u.idutilisateur=$idutilisateur
                order by idmedica
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countM from medicament
                where nomedica like '%$nomedica%' 
                and idutilisateur=$idutilisateur ";
    }

    $resultatuT=$pdo->query($requeteuT);
    $resultatmE=$pdo->query($requete);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrM=$tabCount['countM'];
    $reste=$nbrM % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrM/$size;   
    else
        $nbrPage=floor($nbrM/$size)+1;  // floor : la partie entière d'un nombre décimal
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion des Médicaments</title>
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

 <div class="container">
            <div class="panel panel-success margetop60">         
				<div class="panel-heading">Rechercher médicament</div>
				<div class="panel-body">					
					<form method="get" action="medicament.php" class="form-inline">
						<div class="form-group">                           
                            <input type="text" name="nomedica" 
                                   placeholder="Nom du Médicament"
                                   class="form-control"
                                   value="<?php echo $nomedica ?>"/>                                   
                        </div>
                        
                        <label for="idutilisateur">Utilisateur:</label>
                            
				            <select name="idutilisateur" class="form-control" id="idutilisateur"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Tous les utilisateurs</option>
                                    
                                <?php while ($utilisateur=$resultatuT->fetch()) { ?>
                                
                                    <option value="<?php echo $utilisateur['idutilisateur'] ?>"
                                    
                                        <?php if($utilisateur['idutilisateur']===$idutilisateur) echo "selected" ?>>
                                        
                                        <?php echo $utilisateur['prenom'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button>                        
                        &nbsp;&nbsp;
                        <!--?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?-->
                            <a href="nouveaumed.php" class="btn btn-warning">                          
                                <span class="glyphicon glyphicon-plus"></span>                               
                                NouveauMedicament                             
                            </a>   
                         <!--?php } ?-->                                      
					</form>
				</div>
			</div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">Liste des médicaments (<?php echo $nbrM ?> Médicaments)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>Photo</th> <th>Numéro</th>  <th>Médicament</th> <th>Type</th> <th>Quantité</th> <th>Prix Populaire</th> <th>Conditionnement</th> <th>Date Création</th> <th>Date Expiration</th> <th>Utilisateur</th> 
                                 <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?>
                                <th>Actions</th>
                                <?php } ?>    
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($medicament=$resultatmE->fetch()){ ?>
                                <tr>
                                    <td><img src="../images/<?php echo $medicament['photo']?>" 
                                         width="50px" height="30px" class="rounded"> </td>
                                    <td><?php echo $medicament['numeromed'] ?> </td>
                                    <td><?php echo $medicament['nomedica'] ?> </td>  
                                    <td><?php echo $medicament['typemedica'] ?> </td>
                                    <td><?php echo $medicament['quantite'] ?> </td>
                                    <td><?php echo $medicament['prixpopulaire'] ?> </td>
                                    <td><?php echo $medicament['conditionnement'] ?> </td>
                                    <td><?php echo $medicament['datecreation'] ?> </td>
                                    <td><?php echo $medicament['dateexpiration'] ?> </td>
                                    <td><?php echo $medicament['prenom'] ?> </td>
                                   <td>
                                  
                                   <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?>
                                        <a href="editmed.php?idmedica=<?php echo $medicament['idmedica'] ?>"
                                           class="btn btn-secondary ms mr-2">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                     
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer ce médicament')"
                                        class="btn btn-danger"
                                            href="supprmed.php?idmedica=<?php echo $medicament['idmedica'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;            
                                            </a>
                                            
                                        </td>
                                     <?php } ?>  
                                        </tr>                           
                             <?php } ?>  
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="medicament.php?page=<?php echo $i;?>&medicament=<?php echo $medicament ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
