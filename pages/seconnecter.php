<?php
     session_start();
     require_once('connexiondb.php');

    $login=isset($_POST['login'])?$_POST['login']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";

    $requete="SELECT * FROM utilisateur WHERE login='$login' AND password='$password'";
    $resultat=$pdo->query($requete);
    
    if($utilisateur=$resultat->fetch()){
        if($utilisateur['etat']==1){
            $_SESSION['utilisateur']=$utilisateur;
            header("location:gestionpharmacie.php");

     }else{
           $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre Compte est désactivé.<br> Veuillez contacter l'Administrateur";
            header("location:login.php");
       }
     }else{
           $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou Mot de passe incorrecte!!!";
            header("location:login.php");
    } 
    

?>
