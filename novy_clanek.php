<?php
 require("connect.php");
 session_start();
 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/main.css">
<style>
 .datum_style{
 text-align:right;
 color:red;
 }
  h4{
text-align:left;
padding-left:1%;
}

.form_tvorba{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:60%;
 min-width:300px;
 }
 .nvm{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:20%;
 }
 .obsah{
   width:95%;
 
}
.titulek{
width:50%;
height:4%;
}
#nadpis{
width:98%;
}


h1{color:#323232;}
</style>
<title>Nový článek</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>

<?php
$val3 =  $_GET['star'];
$_SESSION["ID"] = $val3;
?>

 <center>
<form ACTION="insert.php" method="post" class="form_tvorba" enctype="multipart/form-data">
<div class="form" > 
  <h2 id="nadpis">Tvorba rezervace v čísle</h2> 
     
     <h5 class="tyt">Jméno autora:</h5>   
      <input class="titulek" type="text" name="Name_clan" value="" /> <hr>
      
      <h5 class="tyt">Místo pracoviště ->Nepovinné<-</h5>  
      <input class="titulek" type="text" name="Prac_clan" value="" /> <hr>
      
      <h5 class="tyt">Název článku</h5>
      <input class="titulek" type="text" name="Clan_clan" value="" /> <hr>
      
    <h5 class="tyt">Obsah:</h5>
      <textarea  class="obsah" name="Obsah_clan"></textarea><hr>
      
     <h3>Nahrát PDF</h3>
          <input type="file" name="myfile"> <br><br>
          
          
     <div class="checkbox-group required"required>
    <label>Zaškrtnutím souhlasíte s šablonou a pokyny pro přispěvatele a potvrzujete přečtení těchto dokumentů</label><input type="checkbox" required>
   <br>
    <a href="https://www.vspj.cz/soubory/download/id/7344">Pokyny pro přispěvatele</a>
    <br>
    <a href="https://www.vspj.cz/soubory/download/id/4186">Šablona</a>
      <br>
</div>      
    <button name="save" type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Přidat </button>
    <a href="Redakce.php"><button type="button" class="btn btn-secondary btn-lg active" value="Uložit" /> Zpět na hlavní stránku </button></a>
  </div>
    <br> 
  </form> 
  
<br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>
