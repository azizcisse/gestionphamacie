<?php
     require_once('identification.php');
     require_once("connexiondb.php");
    
  
    $nomedic=isset($_GET['nomedic'])?$_GET['nomedic']:"";
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;
   
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

 
    $requeteuT="SELECT * FROM utilisateur ";
    $requetemE="SELECT * FROM medicament";
    
    if($idutilisateur==0){
        $requete="SELECT idvente,nomedic,typmedic,quantite,conditionnement,prixmed,datecreation,prenom 
                from utilisateur as u,vente as v              
                where u.idutilisateur=v.idutilisateur              
                and nomedic like '%$nomedic%' 
                order by idvente
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countV FROM vente
                where nomedic like '%$nomedic%' ";
    }else{
        $requete="SELECT idvente,nomedic,typmedic,quantite,conditionnement,prixmed,datecreation,prenom 
                from utilisateur as u,vente as v
                where u.idutilisateur=v.idutilisateur            
                and nomedic like '%$nomedic%'
                and u.idutilisateur=$idutilisateur
                order by idvente
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countV from vente
                where nomedic like '%$nomedic%' 
                and idutilisateur=$idutilisateur ";
    }

    $resultatmE=$pdo->query($requetemE);
    $resultatuT=$pdo->query($requeteuT);
    $resultatvE=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrV=$tabCount['countV'];
    $reste=$nbrV % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrVente par $size
    if($reste===0) //$nbrVente est un multiple de $size
        $nbrPage=$nbrV/$size;   
    else
        $nbrPage=floor($nbrV/$size)+1;  // floor : la partie entière d'un nombre décimal
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion des Ventes</title>
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
				<div class="panel-heading">Rechercher vente</div>
				<div class="panel-body">					
					<form method="get" action="vente.php" class="form-inline">
						<div class="form-group">                           
                            <input type="text" name="nomedic" 
                                   placeholder="Nom de la vente"
                                   class="form-control"
                                   value="<?php echo $nomedic ?>"/>                                   
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
                            <a href="nouvente.php" class="btn btn-warning">                          
                                <span class="glyphicon glyphicon-plus"></span>                               
                                Nouvelle Vente                             
                            </a>                                      
					</form>
				</div>
			</div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">Liste des ventes (<?php echo $nbrV ?> Ventes)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom Médicament</th> <th>Type Médicament</th>  <th>Quantité</th>  <th>Conditionnement</th>  <th>Prix Medicament</th> <th>Date de Vente</th> <th>Utilisateur</th> 
                                <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                <th>Actions</th>
                                <?php } ?>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($vente=$resultatvE->fetch()){ ?>
                                <tr>                          
                                    <td><?php echo $vente['nomedic'] ?> </td>
                                    <td><?php echo $vente['typmedic'] ?> </td>      
                                    <td><?php echo $vente['quantite'] ?> </td>   
                                    <td><?php echo $vente['conditionnement'] ?> </td>  
                                    <td><?php echo $vente['prixmed'] ?> </td>                                                               
                                    <td><?php echo $vente['datecreation'] ?> </td>                                                            
                                    <td><?php echo $vente['prenom'] ?> </td>
                                   <td>
                                   <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                        <a href="editvente.php?idvente=<?php echo $vente['idvente'] ?>"
                                           class="btn btn-secondary btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cette vente')"
                                        class="btn btn-danger btn-sm"
                                            href="supprimvente.php?idvente=<?php echo $vente['idvente'] ?>">
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
            <a href="vente.php?page=<?php echo $i;?>&vente=<?php echo $vente ?>">
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
