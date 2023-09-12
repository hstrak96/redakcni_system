<?php
session_start();
require("connect.php"); 
?> 
 
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
  <title>Video návod</title>
  </head>
  
  <body>                                     
<?php
 require 'header.php';
?><br>
     <center>

  
 <div class='forum'>
 
 <h1>Video k seznámení s aplikací</h1>
<br><br><br> 

<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/Z1Uce9Mj2vo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<?php
 if ($_SESSION["Opravneni"] >= 2){
 echo ('<br><br><h3>Video pro pokročilé funkce</h3><br>');
 echo ('<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/_9_Isy3VBwY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
 } 
?>

<br><br><br>                                                                                                           
 </div>
                                             
 </center>
   <br><br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>