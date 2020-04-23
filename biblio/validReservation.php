<?php
 session_start();
$host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "librairie";  
 $message = "";  

   try  
 {  
   
       $connect= new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       
      
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }
echo' <!DOCTYPE html>

<html>
<head>
	<title>Bibliothèque</title>
</head>
<body>
 <center> <h1>Confirmation de réservation</h1>';
if(isset($_POST["valid"]))
    {
 
     $_SESSION['numreserve']++; 
         
                 $date_debut = date("Y-m-d");
                 $date_fin = date("Y-m-d", strtotime($date_debut.'+ 5 days'));
                 $codelivre = $_SESSION['codeliv'] ;
                 $codeLecteur = $_SESSION['numLecteur'] ;
                 $numEmprunt="$codeLecteur[0]" . "$codeLecteur[1]" . "$codelivre[0]"."$codelivre[1]";
       
                 $sqlup = "update  livres set livdejareserve='".$_SESSION['numreserve']."'where livcode ='".$codelivre."'";
                 $connect->exec($sqlup);
                 $sqlins = "insert into emprunts ( empnum, empdate ,  empdateret, empcodelivre , empnumlect ) 
                 VALUES ('$numEmprunt','$date_debut','$date_fin','$codelivre','$codeLecteur') "   ;       
                 $connect->exec($sqlins);
echo   "Votre réservation est confirmée sous le numéro:&nbsp<span style='color:#9400D3; font-weight:bold;'>".$numEmprunt."</span><br>" ;
echo "Date de la reservation:&nbsp<span style='color:#008B8B; font-weight:bold;'>".$date_debut."</span><br>" ;
echo "Date du retour:&nbsp<span style='color:#FF4500; font-weight:bold;'>".$date_fin."</span><br><br><br>"; 
echo " <p style='color:#9400D3; font-weight:bold;'>vous pouvez revenir à la liste des livres disponibles à la réservation en cliquant <a href='gestionLecteur.php' style='color:#FF4500;'>ici</a></p>";}