<?php
    require_once('identification.php');
    require_once('connexiondb.php');

    $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;

    $requeteutilisateur="SELECT * FROM utilisateur where idutilisateur=$idutilisateur";
    $resultatutilisateur=$pdo->query($requeteutilisateur);
    $utilisateur=$resultatutilisateur->fetch();

    $prenom=$utilisateur['prenom'];
    $nom=$utilisateur['nom'];
    $age=$utilisateur['age'];
    $sexe=$utilisateur['sexe'];
    $type=$utilisateur['type'];
    $login=$utilisateur['login'];
    $email=$utilisateur['email'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modification de l'Utilisateur</title>
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
                <div class="panel-heading">Formulaire de Modification des informations des Utilisateurs :</div>
                <div class="panel-body">
                    <form method="post" action="updatutilisateur.php" class="form">
                    <div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="idutilisateur" class="form-control"
                             value="<?php echo $idutilisateur?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prenom" class="form-control"
                             value="<?php echo $prenom?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" 
                            value="<?php echo $nom?>"/>
                        </div>
                        <div class="form-group">
                             <label for="age">Date de Naissance :</label>
                            <input type="date" name="age" placeholder="Date de Naissance" 
                            class="form-control" value="<?php echo $age?>"/>
                        </div>
                        <div class="form-group" value="<?php echo $sexe?>">
                        <label for="sexe">Sexe :</label>
			            <select name="sexe" class="form-control" id="sexe">               
                            <option value="Masculin" <?php if($sexe=="Masculin") echo "selected" ?> >Masculin</option>
                            <option value="Feminin" <?php if($sexe=="Feminin") echo "selected" ?> >Feminin</option>                   
			            </select>    
                        </div>   
                        <div class="form-group" value="<?php echo $type?>">
                        <label for="type">Type Utilisateur :</label>
			            <select name="type" class="form-control" id="type">               
                            <option value="Administrateur" <?php if($type=="Administrateur") echo "selected" ?> > Administrateur </option>
                            <option value="Employe" <?php if($type=="Employe") echo "selected" ?> > Employe </option>                   
			            </select>    
                        </div>                
                        <div class="form-group">
                             <label for="login">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control"
                               value="<?php echo $login?>"/>
                        </div>
                        <div class="form-group">
                             <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" class="form-control"
                               value="<?php echo $email?>"/>
                        </div>
                  
                        <button type="submit" class="btn btn-success mr-3"> 
                            <span class="glyphicon glyphicon-save"></span>
                              Enregistrer </button>

                        <button type="reset" class="btn btn-danger  mr-3"> 
                            <span class="glyphicon glyphicon-remove"></span>
                              Annuler </button>

                        <button type="reset" class="btn btn-info"> <a href="editpwd.php?idutilisateur=<?php echo $idutilisateur ?>">
                     <span class="glyphicon glyphicon-pencil"></span>Changer le mot de passe</a></button>
               
    </form>
</div>
</div>
</div>
</body>
</html>
