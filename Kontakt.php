<?php
session_start();
require 'connect.php';   
require_once 'Users.php'; 
$users = new Users();                      
?>
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main3.css">
    <style>
   
    </style>	
  <title>Zprávy</title>
  </head>
  
  <body>                                     
<?php
 require 'header.php';
?><br><br><br>
     <center>

  
 <div class='forum'>

 
 <table class='tablesirka'>


 <tr class="barvatabulky bila" ><td>Jméno</td><td>E-Mail</td></tr>
                  <?php foreach ($users->fetchAll() as $index => $user) { ?>
                <tr>                     
                    <td><?php echo $user['login'] ?></td>                    
                    <td><?php echo $user['email'] ?></td>
                                      
                </tr>
            <?php } ?>

              
            
 
 
 </table>

 </div>
    <br><br><br><br><br><br><br><br><br><br>
 
 </center>
<?php
 require 'footer2.php';
?>
</body>
</html>