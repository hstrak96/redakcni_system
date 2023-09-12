<?php
session_start();
require("connect.php");

                        

  if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
 }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        
        <title>Přehled vyjádření</title>
        <style>
          .barva12{text-decorate:none; color:white;
          
          }
        </style>
    </head>
    
    <body>     
        


        
        
      <?php
        require("header.php");
       
      
      ?>
            <br><br><br>
    <center>
        
        
        <div class='forum'>
        
            <br>
            <table class='tablesirka'>
                
                <tr class="barvatabulky bila" ><td>Pro</td><td>Autor zprávy</td><td>Vyjádření</td><td>Nadpis článku</td><td>Datum</td></tr>
                        <?php
$jmeno=$_SESSION['Username'];                        
$sql = "SELECT * FROM trouble WHERE Prijemce='$jmeno' ORDER BY Datum DESC";
$vysledek = mysqli_query($spojeni, $sql);
$i=0;
while ($radek = mysqli_fetch_assoc($vysledek)):

if (($i%2)==1)    // sude aliche radky maji jinou platnost
       echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
else
       echo "<TR VALIGN=CENTER>";

echo "<TD  ALIGN=CENTER>".$radek["Prijemce"]. "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Autor_zpravy"]. "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Zprava"].  "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Obsah_clanku"].  "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Datum"].  "</TD>";

 $i=$i+1;     
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

<!-- 
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12">
<h6 class="text-uppercase font-weight-bold">Informace</h6>
 <p>Text</p>
</div>
 <div class="footer_second">
<h6 class="text-uppercase font-weight-bold">Fotky</h6>
 <p>Text</p>
</div>
   <div class="col-lg-4 col-md-4 col-sm-12">
     <h6 class="text-uppercase font-weight-bold">Kontakt</h6>
     <p>Jihlava
     <br>Studenti
     <br><a href="" class="">YouTube</a>
               </p>
   </div>
 </div>
</div>

-->
