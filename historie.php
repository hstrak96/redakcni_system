<?php
session_start();
$username = "lupinci";
$password = "Lup1nc12020*";
$pdo = new PDO("mysql:host=localhost; dbname=lupinci",$username,$password);    

                         

  if($_SESSION["Opravneni"] < 4){
 
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
   
    </style>	
  <title>Historie aktivit</title>
  </head>
  
  <body>                                     
<?php
 require 'header.php';
?><br><br><br>
     <center>

  
 <div class='forum'>

              <div class="table-responsive">
 <table class='tablesirka'>


 <tr class="barvatabulky bila" ><td>Login</td><td>E-Mail</td><td>Datum</td></tr>
                 
                <tr>                     
                                                                                                               
   <?php                        
$sql = "SELECT Login, Uprava, Datum FROM historie ORDER BY Datum DESC;";
$vysledek = $pdo->query($sql);


 while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p>$radek[Login]</p></td><td>$radek[Uprava]</td><td>$radek[Datum]</td></tr>");

endwhile;



?>
                                      
                </tr>
           

              
            
 
 
 </table>
   </div>
 </div>
    <br><br><br><br><br><br><br><br><br><br>
 
 </center>
<?php
 require 'footer.php';
?>
</body>
</html>
