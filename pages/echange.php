<?php
    require_once('identification.php');
    require_once("connexiondb.php");
    
  
    $nompharmacie=isset($_GET['nompharmacie'])?$_GET['nompharmacie']:"";
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;
    
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteuT="SELECT * FROM utilisateur";
    
    
    if($idutilisateur==0){
        $requete="SELECT idechange,nompharmacie,medicament,typechange,quantite,datecreation,prenom 
                from utilisateur as u,echange as e
                where u.idutilisateur=e.idutilisateur
                and nompharmacie like '%$nompharmacie%' 
                order by idechange
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countE FROM echange
                where nompharmacie like '%$nompharmacie%' ";
    }else{
        $requete="SELECT idechange,nompharmacie,medicament,typechange,quantite,datecreation,prenom 
                from utilisateur as u,echange as e
                where u.idutilisateur=e.idutilisateur
                and nompharmacie like '%$nompharmacie%'
                and u.idutilisateur=$idutilisateur
                order by idechange
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countE from echange
                where nompharmacie like '%$nompharmacie%' 
                and idutilisateur=$idutilisateur ";
    }

    $resultatuT=$pdo->query($requeteuT);
    $resultateC=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrE=$tabCount['countE'];
    $reste=$nbrE % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrE/$size;   
    else
        $nbrPage=floor($nbrE/$size)+1;  // floor : la partie entière d'un nombre décimal
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion des echanges</title>
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
				<div class="panel-heading">Rechercher echange</div>
				<div class="panel-body">					
					<form method="get" action="echange.php" class="form-inline">
						<div class="form-group">                           
                            <input type="text" name="nomedic" 
                                   placeholder="Nom de l'Echange"
                                   class="form-control"
                                   value="<?php echo $nompharmacie ?>"/>                                   
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
                            <a href="nouvechange.php" class="btn btn-warning">                          
                                <span class="glyphicon glyphicon-plus"></span>                               
                                Nouvelle Echange                             
                            </a>                                      
					</form>
				</div>
			</div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">Liste des echanges (<?php echo $nbrE ?> Echanges)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom Pharmacie</th> <th>Médicament</th>  <th>Type Médicament</th> <th>Quantité Echangé</th> <th>Date d'Echange</th> <th>Utilisateur</th> 
                                <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                <th>Actions</th>
                                <?php } ?>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($echange=$resultateC->fetch()){ ?>
                                <tr>                             
                                    <td><?php echo $echange['nompharmacie'] ?> </td>
                                    <td><?php echo $echange['medicament'] ?> </td>  
                                    <td><?php echo $echange['typechange'] ?> </td>
                                    <td><?php echo $echange['quantite'] ?>  </td>
                                    <td><?php echo $echange['datecreation'] ?> </td>                                   
                                    <td><?php echo $echange['prenom'] ?> </td>
                                   <td>
                                   <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                
                                        <a href="editechange.php?idechange=<?php echo $echange['idechange'] ?>"
                                           class="btn btn-secondary btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cette echange')"
                                        class="btn btn-danger btn-sm"
                                            href="supprimechange.php?idechange=<?php echo $echange['idechange'] ?>">
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
            <a href="echange.php?page=<?php echo $i;?>&echange=<?php echo $echange ?>">
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
