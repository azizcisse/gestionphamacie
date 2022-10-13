<?php    
            require_once('identification.php');
            require_once('connexiondb.php');
            
            $idvente=isset($_GET['idvente'])?$_GET['idvente']:0;

            $requete="DELETE FROM vente WHERE idvente=?";
            
            $params=array($idvente);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:vente.php');   
    
?>