<?php
session_start();
$username = "lupinci";
$password = "Lup1nc12020*";
$pdo = new PDO("mysql:host=localhost; dbname=lupinci",$username,$password);

  if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
 }                                           
?>
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
    <style>
     .blok1{
text-align:left;
font-family:Cavolini;
color:#414141;
}
.text123{font-size:15px;


}

    </style>	
  <title>Prehled Uzivatelu</title>
  </head>
  
  <body>                                     
<?php require 'header.php';
?><br /><br /><br />
     <center>

  
 <div class='forum'>

 
 <table class='tablesirka'>


 <tr class="barvatabulky bila" ><td>Autor</td><td>Název Článku</td><td>Status</td></tr>
                 
                <tr>  

                                                                                                               
   <?php                        
$sql = "SELECT Autor, Clanek, Hodoceni, USER, kontrol FROM Rezervace INNER JOIN hodnoceni WHERE (kontrol=ID_But && USER='$_SESSION[Username]')";
$vysledek = $pdo->query($sql);

 while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p>$radek[Autor]</p></td><td>$radek[Clanek]</td><td><a href=\"hodn.php?id=$radek[kontrol]\">$radek[Hodoceni]</a></td></tr>");

endwhile; 

$sql2 = "SELECT * FROM Rezervace WHERE ID_But NOT IN (SELECT kontrol FROM hodnoceni) AND But_stat=1 AND USER='$_SESSION[Username]' ";
$vysledek2 = $pdo->query($sql2);

while (($radek = $vysledek2->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p>$radek[Autor]</p></td><td>$radek[Clanek]</td><td>Prozatim neohodnoceno</td></tr>");

endwhile;

$sql3 = "SELECT * FROM zamitnute WHERE zapsal='$_SESSION[Username]'";
$vysledek3 = $pdo->query($sql3);

while (($radek = $vysledek3->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p>$radek[Autor]</p></td><td>$radek[Nazev]</td><td><a href=\"hodn.php?id2=$radek[ID]\">$radek[Stav]</a></td></tr>");

endwhile;  
?>
                                      
                </tr>
           

              
            
 
 
 </table>

 </div>
   
 
 </center>
<?php
 require 'footer.php';
?>
</body>
</html>
