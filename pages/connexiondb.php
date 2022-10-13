<?php
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=mapharmacie","root","");
    } catch (Exception $e) {
        die('Erreur de connexion :' .$e->getMessage());
    }   
 ?>