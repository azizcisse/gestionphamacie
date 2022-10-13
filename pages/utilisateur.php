<?php
    require_once('identification.php');
    require_once("connexiondb.php");
    
  
    $prenom=isset($_GET['prenom'])?$_GET['prenom']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    
    $requeteuT="SELECT * FROM utilisateur WHERE prenom LIKE '%$prenom%' LIMIT $size offset $offset";
    $requeteCount="SELECT COUNT(*) countU FROM utilisateur";
      
    $resultatuT=$pdo->query($requeteuT);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrU=$tabCount['countU'];
    $reste=$nbrU % $size;   
                                 
    if($reste===0) 
        $nbrPage=$nbrU/$size;   
    else
        $nbrPage=floor($nbrU/$size)+1;  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion des Utilisateurs</title>
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
				<div class="panel-heading">Rechercher des utilisateurs</div>
				<div class="panel-body">
					<form method="get" action="utilisateur.php" class="form-inline">
						<div class="form-group">
                            <input type="text" name="prenom" 
                                   placeholder="Prénom"
                                   class="form-control mr-3"
                                   value="<?php echo $prenom ?>"/>
                        </div>                       			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button>                                              
					</form>
				</div>
			</div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrU ?> utilisateurs)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                             <th>Prenom</th> <th>Nom</th> <th>Date de Naissance</th> <th>Sexe</th> 
                             <th>Type</th> <th>Login</th> <th>Email</th>
                             <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                                <th>Actions</th>
                                <?php } ?>   
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($utilisateur=$resultatuT->fetch()){ ?>
                               <tr class="<?php echo $utilisateur['etat']==1?'success':'bg-dark'?>">                                  
                                    <td><?php echo $utilisateur['prenom'] ?> </td>
                                    <td><?php echo $utilisateur['nom'] ?> </td>
                                    <td><?php echo $utilisateur['age'] ?> </td> 
                                    <td><?php echo $utilisateur['sexe'] ?> </td>  
                                    <td><?php echo $utilisateur['type'] ?> </td> 
                                    <td><?php echo $utilisateur['login'] ?> </td> 
                                    <td><?php echo $utilisateur['email'] ?> </td> 
                                   <td>
                                   <?php if ($_SESSION['utilisateur']['type']== 'Administrateur') {?> 
                               
                                        <a href="editutilisateur.php?idutilisateur=<?php echo $utilisateur['idutilisateur'] ?>" class="btn btn-secondary">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"
                                            href="supprimutilisateur.php?idutilisateur=<?php echo $utilisateur['idutilisateur'] ?>" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="activerutilisateur.php?idutilisateur=<?php echo $utilisateur['idutilisateur'] ?>&etat=<?php echo $utilisateur['etat'] ?> ">
                                                <?php  
                                                    if($utilisateur['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                ?>
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
            <a href="utilisateur.php?page=<?php echo $i;?>&prenom=<?php echo $prenom ?>">
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
</html>
