<!DOCTYPE html>
<html>
    <!--   NOM: HANANE EL FERDAOUSSI    -->
<head>
	<title>Bibliothèque</title>
</head>
<body>

<center><h1>Enregistrement d'un livre</h1>
<form method="POST" action="validLivre.php">
 

<label >Nom de l'auteur: </label><input type="text" name="nomauteur" style=" border: 1px solid #ccc;height:25px; 

            border-radius:  20px;" required/> <br><br> 
<label>Prénom de l'auteur : </label><input type="text" name="prenomauteur"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px;"  required/> <br/> <br/> 

    <label>Titre : </label><input type="text" name="titre"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;" required/> <br/> <br/> 
    
    <label>Catégorie : </label>
    <select name="categorie" style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;">
  <option value="roman">roman</option>
  <option value="junior">junior</option>
  <option value="sciences-fiction">sciences-fiction</option>
 
</select>
    <br/> <br/> 
    
    <label>Numéro ISBN : </label><input type="text" name="numisbn"  style=" border: 1px solid #ccc; height:25px; border-radius:  20px; margin-left:90px;" size="10" required/> <br/> <br/> 
          
<input type="submit" name="envoie" value="Enregistrer" style=" background:#6A5ACD; width:100px;height:23px; border: 0px;   border-radius:  15px;
color:white;
  "/>
 
</form></center>
   
</body>
</html>