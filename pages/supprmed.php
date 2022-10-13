<?php    
            session_start();
            if(isset($_SESSION['utilisateur']) ){
              
            require_once('connexiondb.php');
            
            $idmedica=isset($_GET['idmedica'])?$_GET['idmedica']:0;

            $requete="DELETE FROM medicament WHERE idmedica=?";
            
            $params=array($idmedica);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:medicament.php');      
       
    }else {
            header('location:login.php');
    } 
    
?>