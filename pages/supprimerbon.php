<?php    
           require_once('identification.php');           
           require_once('connexiondb.php');
            
            $idboncommande=isset($_GET['idboncommande'])?$_GET['idboncommande']:0;

            $requete="DELETE FROM boncommande WHERE idboncommande=?";
            
            $params=array($idboncommande);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:bon.php');   
    
?>