 <?php
 session_start();
//CONX BD
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
    if(isset($_POST["envoie"]))    
    {
        $code = $_POST['code'] ;
               $nom = $_POST['nom'] ;
        $prenom = $_POST['prenom'];
        $password = $_POST['pswd'];
        $adresse= $_POST['adresse'];
        $ville= $_POST['ville'];
        $codepostal= $_POST['codepostal'];
      
        
        $_SESSION['codelect']=$code; 
      
      $req =$connect->prepare('INSERT INTO lecteurs  (lecnum ,lecnom ,lecprenom ,lecadresse , lecville , leccodepostal , lecmotdepasse )  VALUES("'.$code.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$ville.'","'.$codepostal.'","'.$password.'"
		)') ;
        $req->execute(array( 'lecnum'=>$code,'lecnom'=>$nom,'lecprenom '=>$prenom,'lecadresse'=>$adresse,'lecville'=>$ville,'leccodepostal'=>$codepostal,'lecmotdepasse'=>$password));
        
    }
    ?>
<!DOCTYPE html>

<html>
<head>
	<title>Bibliothèque</title>
</head>
<body>
 <center> <h1>Validation d'un lecteur</h1>

    
    <lablel>Nom :<span style='color:#008B8B; font-weight:bold;'><?php echo $_POST['nom']?></span></lablel><br>
    <lablel>Prenom :<span style='color:#008B8B ; font-weight:bold;'> <?php  echo $_POST['prenom']?></span></lablel><br>
    <lablel>Adresse :<span style='color:#008B8B; font-weight:bold;'><?php  echo $_POST['adresse']?></span></lablel><br>
    <lablel>Ville :<span style='color:#008B8B; font-weight:bold;'><?php  echo $_POST['ville'] ?></span></lablel><br>
    <lablel>Code postal :<span style='color:#008B8B; font-weight:bold;'><?php  echo $_POST['codepostal']?></span></lablel>
    <p style='color:#9400D3; font-weight:bold;'>vous avez maintenant la possibilté de reserver des livres en vous <a href="login.php" style='color:#FF4500;'>identifiant ici</a></p>
    
    
</body>
</html>