<?php   
     session_start();
      if(!isset($_SESSION['utilisateur']))
       header('location:login.php');

       require_once("connexiondb.php");
 ?>