<!DOCTYPE html>
<html>
    <!--   NOM: HANANE EL FERDAOUSSI    -->
<head>
	<title>Bibliothèque</title>
</head>
<body>

<center><h1>Enregistrement d'un lecteur</h1>
<form method="POST" action="validLecteur.php">
 

    <label >Etrez un code : </label><input type="text" name="code" style=" border: 1px solid #ccc;height:25px; 

            border-radius:  20px;margin-left:70px;" required/> <br><br> 
<label >Nom : </label><input type="text" name="nom" style=" border: 1px solid #ccc;height:25px; margin-left:110px;

            border-radius:  20px;" required/> <br><br> 
<label>Prénom : </label><input type="text" name="prenom"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;"  required/> <br/> <br/> 

    <label>Mot de passe : </label><input type="password" name="pswd"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px;margin-left:70px; " required/> <br/> <br/> 
    
    <label>Adresse : </label><input type="text" name="adresse"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;" required/> <br/> <br/> 
    
     <label>Ville : </label><input type="text" name="ville"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:110px;" required/> <br/> <br/> 
    
    <label>Code Postal : </label><input type="text" name="codepostal"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;" size="10" required/> <br/> <br/> 
          
<input type="submit" name="envoie" value="Enregistrer" style=" background:#6A5ACD; width:100px;height:23px; border: 0px;   border-radius:  15px;
color:white;
  "/>
 
</form></center>
   
</body>
</html>