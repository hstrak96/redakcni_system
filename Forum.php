<?php
session_start();
require("db_connect.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main2.css">
        
        <title>Fórum</title>
    </head>
    
    <body>     
<?php
 require 'header.php';
?><br><br><br>
    <center>
        
        
        <div class='forum'>
            <button class='btn-danger left' type="button"><a class="barva12" href="forum1.php">přidat nové téma</a></button>
            <br>
            
            <table class='tablesirka'>
                
                <tr class="barvatabulky bila" ><td>Téma</td><td>Autor</td></tr>
                        <?php
                        
$sql = "SELECT tema_nadpis, tema_login, tema_id from tema order by tema_vznik;";
$vysledek = $pdo->query($sql);


 while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p><a href=\"tema.php?id=$radek[tema_id]\">$radek[tema_nadpis]</a></p></td><td>$radek[tema_login]</td></tr>");

endwhile;



?>
  
        
            </table>
        </div>
        
        
    </center>
<?php
 require 'footer2.php';
?>
</body>
</html>