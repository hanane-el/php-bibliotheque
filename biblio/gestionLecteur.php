<?php  
 session_start();  

$host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "librairie";  
 $message = "";  

   try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      if(isset($_POST["envoie"]))  
      {  
           if(empty($_POST["nom"]) || empty($_POST["password"]))  
           {  
                $_SESSION['connexion']="refuse";  
           }  
           else  
           {  
               $name = $_POST['nom'];
               $password =$_POST['password'];
    $sql = "SELECT  lecnum,lecnom,lecmotdepasse FROM lecteurs WHERE lecnom  = '".$name."' and lecmotdepasse ='".$password."'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
     $stmt->execute();
     $conn = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if($conn == false)  
                {  
                    $_SESSION['connexion']="refuse";  
                }  
                else  
                {  
                      $_SESSION['connexion']="accepte";    
                      $_SESSION['numLecteur'] = $conn['lecnum']; 
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
  
 ?>  
<!DOCTYPE html>

<html>
<head>
	<title>Bibliothèque</title>
</head>
<body>
 <center> <h1>Gestion lecteur</h1>

    <?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
    
     if($_SESSION['connexion']=="accepte")
         
     { echo $_SESSION['connexion'];
         echo'Le lecteur num: '.$_SESSION['numLecteur'].'est reconnu!'."<br>";
         echo'<h2>Voici la liste des ouverages disponibles à la réservation</h2>';
         echo'
         <table border=0>
    <tr style="background:#00FFFF;">
        <th>code du livre</th>   <th>nom auteur</th>
        <th>prenom auteur</th>    <th>titre</th>  
        <th>categorie</th>  <th>num isbn</th> <th>Réserver</th>      
        
    </tr>
         ';
             $sql = 'SELECT  livcode , livnomaut  ,livprenomaut , livtitre  , livcategorie, livISBN FROM livres';
    $stmt = $connect->prepare($sql);
    $stmt->execute();
         while($livres = $stmt->fetch())
         {
             echo'
             <tr>  
                     <td>'. $livres["livcode"].'</td>  
                     <td>'.$livres["livnomaut"].'</td>  
                     <td>'. $livres["livprenomaut"].'</td> 
                     <td>'.$livres["livtitre"].'</td> 
                     <td>'.$livres["livcategorie"].'</td> 
                     <td>'. $livres["livISBN"].'</td>  
                     <td> <a href="reservation.php?id='.$livres["livcode"].'" style="color:#DA70D6;">Reserver</a></td>
                              
             </tr>
             ';}
             
             
             
             
             
             
             
             //RESERVATIONS
             echo'<h2>Voici la liste des réservations</h2>';
         echo'
         <table border=0>
    <tr style="background:#FA8072;">
        <th>code du livre</th>   <th>nom auteur</th>
        <th>prenom auteur</th>    <th>titre</th>  
        <th>categorie</th>  <th>num isbn</th>       
        
    </tr>
         ';
             $codeLecteur = $_SESSION['numLecteur'];

             $sql = 'select livres.livcode,livres.livnomaut,livres.livprenomaut ,livres.livtitre,livres.livcategorie,livres.livISBN
             from livres inner join emprunts on livres.livcode = emprunts.empcodelivre where empnumlect = :id ';
    $stmt = $connect->prepare($sql);
    $stmt ->bindValue(':id',$codeLecteur) ;
    $stmt->execute();
         while($livresres = $stmt->fetch())
         {
             echo'
             <tr>  
                     <td>'. $livresres["livcode"].'</td>  
                     <td>'.$livresres["livnomaut"].'</td>  
                     <td>'. $livresres["livprenomaut"].'</td> 
                     <td>'.$livresres["livtitre"].'</td> 
                     <td>'.$livresres["livcategorie"].'</td> 
                     <td>'. $livresres["livISBN"].'</td>  
                              
             </tr>
             ';}
        
     }
     elseif($_SESSION['connexion']=="refuse")
         
     { 
         echo'Le lecteur n\'est pas reconnu!'."<br>";
         echo'tentez <a href= \'login.php\' style="color:#DA70D6;"> ici </a> pour une nouvelle identification OU si
         vous etes nouveau enregistrez vous <a href= \'registerLecteur.php\' style="color:#DA70D6;"> ici </a>'."<br>";
         
         }
     
     ?>
    
    
</body>
</html>