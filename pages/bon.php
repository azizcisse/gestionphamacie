<?php
    require_once('identification.php');
    require_once("connexiondb.php");

    $nomboncom=isset($_GET['nomboncom'])?$_GET['nomboncom']:"";
    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteuT="SELECT * FROM utilisateur ";
   
    
    if($idutilisateur==0){
        $requete="SELECT idboncommande,numerobon,nomboncom,quantitecommande,dateboncom,prenom 
                from utilisateur as u,boncommande as b
                where u.idutilisateur=b.idutilisateur
                and nomboncom like '%$nomboncom%' 
                order by idboncommande
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countB FROM boncommande
                where nomboncom like '%$nomboncom%' ";
    }else{
        $requete="SELECT idboncommande,numerobon,nomboncom,quantitecommande,dateboncom,prenom 
                from utilisateur as u,boncommande as b
                where u.idutilisateur=b.idutilisateur
                and nomboncom like '%$nomboncom%'
                and u.idutilisateur=$idutilisateur
                order by idboncommande
                limit $size
                offset $offset";
        
        $requeteCount="SELECT count(*) countB from boncommande
                where nomboncom like '%$nomboncom%' 
                and idutilisateur=$idutilisateur ";
    }

    $resultatuT=$pdo->query($requeteuT);
    $resultatB=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrB=$tabCount['countB'];
    $reste=$nbrB % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrB/$size;   
    else
        $nbrPage=floor($nbrB/$size)+1;  // floor : la partie entière d'un nombre décimal
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion des Bons de Commande</title>
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
				<div class="panel-heading">Rechercher bon de commande</div>
				<div class="panel-body">					
					<form method="GET" action="bon.php" class="form-inline">
						<div class="form-group">                           
                            <input type="text" name="nomboncom" 
                                   placeholder="Nom de bon de commande"
                                   class="form-control"
                                   value="<?php echo $nomboncom ?>"/>                                   
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
                            <a href="nouveaubon.php" class="btn btn-warning">                          
                                <span class="glyphicon glyphicon-plus"></span>                               
                                Nouveau Bon                             
                            </a>                                      
					</form>
				</div>
			</div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">Liste des bons de commande (<?php echo $nbrB ?> Bons de Commande)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Numéro Bon</th> <th>Bon De Commande</th> <th>Quantité</th> <th>Date de Bon De Commande</th> <th>Utilisateur</th>
                                <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                <th>Actions</th>
                                <?php } ?>  
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($boncommande=$resultatB->fetch()){ ?>
                                <tr>
                                    <td><?php echo $boncommande['numerobon'] ?> </td>
                                    <td><?php echo $boncommande['nomboncom'] ?> </td>              
                                    <td><?php echo $boncommande['quantitecommande'] ?> </td>
                                    <td><?php echo $boncommande['dateboncom'] ?> </td>  
                                    <td><?php echo $boncommande['prenom'] ?> </td>
                                   <td>
                                   <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                
                                        <a href="editbon.php?idboncommande=<?php echo $boncommande['idboncommande'] ?>"
                                           class="btn btn-secondary btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer ce bon de commande')"
                                        class="btn btn-danger btn-sm"
                                            href="supprimerbon.php?idboncommande=<?php echo $boncommande['idboncommande'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;            
                                        <a href="imprimcommande.php?idboncommande=<?php echo $boncommande['idboncommande'] ?>"
                                           class="btn btn-warning btn-sm">
                                            <span class="glyphicon glyphicon-print"></span>
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
            <a href="bon.php?page=<?php echo $i;?>&bon=<?php echo $bon ?>">
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
