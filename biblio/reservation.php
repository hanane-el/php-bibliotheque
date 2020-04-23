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
 <center> <h1>Réserver un livre</h1>
<h3>Vous désirez réserver le livre suivant:</h3>';

 if(isset($_GET['id'])) {
                                    
      $ID=$_GET['id'];$_SESSION['codeliv']=$ID; 
     $reponse = $connect->query("select * from livres where livcode= '".$ID."'");
   
        while ($donnees = $reponse->fetch()){
            echo'
        <form method="post" action="validReservation.php" > <table border=0>
    <tr >
        <th style="background:#FA8072;">code du livre</th> <td>'.$donnees['livcode'].'</td></tr>  
        <tr><th style="background:#FA8072;">nom auteur</th><td>'.$donnees['livnomaut'].'</td></tr> 
       <tr> <th style="background:#FA8072;">prenom auteur</th><td>'.$donnees['livprenomaut'].'</td></tr>
       <tr><th style="background:#FA8072;">titre</th> <td>'.$donnees['livtitre'].'</td></tr> 
       <tr> <th style="background:#FA8072;">categorie</th><td>'.$donnees['livcategorie'].'</td></tr>
       <tr><th style="background:#FA8072;">num isbn</th>   <td>'.$donnees['livISBN'].'</td>        
    </tr>';
$_SESSION['numreserve'] = $donnees['livdejareserve'];
    


        }}
   echo'  </table>
<br>
<button type="submit" name ="valid">Confirmer</button>
</form>';
 
?>