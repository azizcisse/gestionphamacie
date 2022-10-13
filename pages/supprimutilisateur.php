<?php     
            require_once('identification.php');
            require_once('connexiondb.php');
            
            $idutilisateur=isset($_GET['idutilisateur'])?$_GET['idutilisateur']:0;

            $requete="DELETE FROM utilisateur WHERE idutilisateur=?";
            
            $params=array($idutilisateur);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:utilisateur.php');   
            
    
    
?>