<?php

require_once("connexiondb.php");
require_once("fonctions.php");

$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $age=isset($_POST['age'])?$_POST['age']:"";
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:"";
    $type=isset($_POST['type'])?$_POST['type']:"";
    $login=isset($_POST['login'])?$_POST['login']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";


       
    if (isset($prenom)) {
        $filtredPrenom = filter_var($prenom, FILTER_SANITIZE_STRING);

        if (strlen($filtredPrenom) < 3) {
            $validationErrors[] = "Erreur!!! Le champ ne peut pas etre vide";
        }
    }

    if (isset($nom)) {
        $filtredNom = filter_var($nom, FILTER_SANITIZE_STRING);

        if (strlen($filtredNom) < 2) {
            $validationErrors[] = "Erreur!!! Le champ ne peut pas etre vide";
        }
    }



    if (date($age)) {
        $filtredAge = filter_var($age, FILTER_SANITIZE_STRING);

        if ($filtredAge != true) {
            $validationErrors[] = "Erreur!!! L'age doit etre choisi";
        }
    }

      
    if (isset($sexe)) {
        $filtredSexe = filter_var($sexe, FILTER_SANITIZE_STRING);

        if ($filtredSexe != true) {
            $validationErrors[] = "Erreur!!! Le sexe doit etre choisi";
        }
    }


    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valide";

        }
    }


    if (isset($password)) {
        $filtredpassword = filter_var($password, FILTER_SANITIZE_STRING);
        if (empty($password)) {
            $validationErrors[] = "Erreur!!! Le mot de passe ne doit pas etre vide";
        }
    }

    
    if (empty($validationErrors)) {
        if (rechercher_par_login($login) == 0 & rechercher_par_email($email) == 0) {
            $requete = $pdo->prepare("INSERT INTO utilisateur(prenom,nom,age,sexe,type,etat,login,email,password) 
                                        VALUES(:prenom,:nom,:age,:sexe,:type,:etat,:login,:email,:password)");

            $requete->execute(array(
                'prenom' => $prenom,
                'nom' => $nom,
                'age' => $age,
                'sexe' => $sexe,
                'type' => 'Employe',
                'etat' => 0,
                'login' => $login,
                'email' => $email,
                'password' => $password
               ));

            $success_msg = "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
        } else {
            if (rechercher_par_login($login) > 0) {
                $validationErrors[] = 'Désolé le login exsite deja';
            }
            if (rechercher_par_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }

    }

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Création d'un nouveau compte utilisateur</title>
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
       
        
        <div class="container col-md-6 col-md-offset-3">
                       
             <div class="panel panel-danger margetop60">
                <div class="panel-heading text-center">Création d'un nouveau compte utilisateur :</div>
                <div class="panel-body">
                    <form class="form" method="POST" >
						
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prenom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="age">Date de Naissance :</label>
                            <input type="date" name="age" placeholder="Date de Naissance" class="form-control"/>
                        </div>
                        <div class="form-group">
                        <label for="sexe">Sexe :</label>
			            <select name="sexe" class="form-control">               
                            <option value="Masculin"> Masculin </option>
                            <option value="Feminin"> Feminin </option>                   
			            </select>    
                        </div>   
                        <div class="form-group">
                        <label for="type">Type Utilisateur :</label>
			            <select name="type" class="form-control">               
                            <option value="Administrateur"> Administrateur </option>
                            <option value="Employe"> Employe </option>                   
			            </select>    
                        </div>                        
                        <div class="form-group">
                        <label for="login">Login :</label>
                       <input type="text" required="required" minlength="4" title="Le login doit contenir au moins 4 caractères..."
                        name="login" placeholder="Taper votre login" autocomplete="off" class="form-control">
                    </div>
                           
                    <div class="form-group">
                    <label for="email">Email :</label>
                     <input type="email" required="required" name="email" placeholder="Taper votre email"autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="password">Mot de Passe :</label>
                       <input type="password" required="required" minlength="3" title="Le Mot de passe doit contenir au moins 3 caractères..."
                      name="password" placeholder="Votre mot de passe" autocomplete="password" class="form-control">                
                    </div>  
                                                              
                        <input type="submit" class="btn btn-primary glyphicon glyphicon-save" value="Enregistrer"> 
                       
                        <input type="reset" class="btn btn-danger" value="Annuler">
                 
    </form>
    <br>
    <?php

    if (isset($validationErrors) && !empty($validationErrors)) {
        foreach ($validationErrors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }


    if (isset($success_msg) && !empty($success_msg)) {
        echo '<div class="alert alert-success">' . $success_msg . '</div>';

    }

    ?>

</div>

</body>
</html>