<?php    
            require_once('identification.php');
            require_once('connexiondb.php');
            
            $idechange=isset($_GET['idechange'])?$_GET['idechange']:0;

            $requete="DELETE FROM echange WHERE idechange=?";
            
            $params=array($idechange);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:echange.php');   
    
?>