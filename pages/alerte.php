<?php
    require_once('identification.php');
    
    $message=isset($_GET['message'])?$_GET['message']:"Erreur";
    
    $url=isset($_GET['url'])?$_GET['url']:"index.php";
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Alerte</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

 <div class="container margetop60">
           
                <div class="alert alert-danger">
                
                    <h4><?php echo $message ?></h4> 
                                      
                </div>
                
                <br><br>
                
                <div class="alert alert-info">
                
                    <h4>Vous serez redireger dans 3 secondes</h4>
                    
                   	<?php  header("refresh:5;url=$url"); ?>
                   	
                </div>
        
        </div>  
</body>
</html>
