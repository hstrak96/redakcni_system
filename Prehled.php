<?php
session_start();
$username = "lupinci";
$password = "Lup1nc12020*";
$pdo = new PDO("mysql:host=localhost; dbname=lupinci",$username,$password);  
                        

  if($_SESSION["Opravneni"] < 6){
 
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
  <title>Přehled uživatelů</title>
  </head>
  
  <body>                                     
<?php require 'header.php';
?><br /><br /><br />
     <center>

  
 <div class='forum'>

 
 <table class='tablesirka'>


 <tr class="barvatabulky bila" ><td>Typ Uživatele</td><td>Login</td><td>Email</td><td>Změnit práva</td></tr>
                 
                <tr>  
  
                                                                                                               
   <?php                        
$sql = "SELECT ID_Opr, login, email FROM login_redaktor;";
$vysledek = $pdo->query($sql);


 while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td>");
     switch ($radek[ID_Opr]) {
    case 0:
        echo "";
        break;
    case 1:
        echo "Běžný uživatel";
        break;
    case 2:
        echo "Autor";
        break;
    case 3:
        echo "Recenzent";
        break;
    case 4:
        echo "Redaktor";
        break;
    case 5:
        echo "Šéfredaktor";
        break;
    case 6:
        echo "Administrátor";
        break;
    case 7:
        echo "";
        break;
}
     echo("</td><td>$radek[login]</td><td>$radek[email]</td>");
     echo("<td><a href='ChangeUser.php?login=$radek[login]&priv=$radek[ID_Opr]'>Uptavit</a></td></tr>");
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
