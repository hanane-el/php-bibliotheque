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
               $nomAut = $_POST['nomauteur'] ;
        $prenomAut = $_POST['prenomauteur'];
        $titre = $_POST['titre'];
        $categorie= $_POST['categorie'];
        $isbn= $_POST['numisbn'];
        $codeLivre="$nomAut[0]" . "$nomAut[1]" . "$prenomAut[0]"."$prenomAut[1]". "$categorie[0]" ."$categorie[1]"."$isbn[8]"."$isbn[9]"; 
        
        
        $_SESSION['codeliv']=$codeLivre; 
      
      $req =$connect->prepare('INSERT INTO livres (livcode , livnomaut  ,livprenomaut , livtitre  , livcategorie, livISBN ) VALUES("'.$codeLivre.'","'.$nomAut.'","'.$prenomAut.'","'.$titre.'","'.$categorie.'","'.$isbn.'"
		)') ;
        $req->execute(array( 'livcode'=>$codeLivre,'livnomaut'=>$nomAut,'livprenomaut'=>$prenomAut,'livtitre'=>$titre,'livcategorie'=>$categorie,'livISBN'=>$isbn));
        
    }
    ?>
<!DOCTYPE html>

<html>
<head>
	<title>Bibliothèque</title>
</head>
<body>
 <center> <h1>Validation d'un livre</h1>

    
    <lablel>Nom de l'auteur :<span style='color:#008B8B; font-weight:bold;'><?php echo $_POST['nomauteur']?></span></lablel><br>
    <lablel>Prenom de l'auteur :<span style='color:#008B8B ; font-weight:bold;'> <?php  echo $_POST['prenomauteur'] ?></span></lablel><br>
    <lablel>Titre :<span style='color:#008B8B; font-weight:bold;'><?php  echo $_POST['titre']?></span></lablel><br>
    <lablel>Categorie :<span style='color:#008B8B; font-weight:bold;'><?php  echo$_POST['categorie'] ?></span></lablel><br>
    <lablel>NumISBN :<span style='color:#008B8B; font-weight:bold;'><?php  echo $_POST["numisbn"] ?></span></lablel>
    
    
    
</body>
</html>