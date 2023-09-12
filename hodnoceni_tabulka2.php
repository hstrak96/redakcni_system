<?php
session_start();
require("connect.php"); 
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        
        <title>Ohodnoceno</title>
    </head>
    
    <body>      
    <?php
        require("header.php");
    ?>
    <br><br><br>
    <center>   
        <div class='forum'>
           
            <br>
            <h2 align="left">Články čekající na ohodnocení:</h2>
            <?php
 if($_SESSION["Opravneni"] >= 3){
 
 echo('

        
                 <form action="ohodnoceni.php" method="post">

            <br>
            
                       ');
                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql = "SELECT * FROM Rezervace WHERE ID_But NOT IN (SELECT kontrol FROM hodnoceni) AND INT_Stav=1";  
                        $vysledek = mysqli_query($spojeni, $sql);

                        $i=0;
                        if ($vysledek->num_rows > 0) {
                        echo('<table class="tablesirka">
                
                <tr class="barvatabulky bila" ><td>Autor</td><td>Obsah</td><td>Známka</td><td>Ohodnocení</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 

                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";
                        echo "<TD  ALIGN=CENTER></TD>";
                        echo "<TD  ALIGN=CENTER><button class='btn-danger left' name='btn' type='submit' value=". $radek['ID_But'] .">Ohodnotit</button></TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile;  
                        } else {
                        echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
                </table></form>
 ');}
?>        
        </div> 
    </center>

    <center>   
        <div class='forum'>
           
            <br>
            <h2 align="left">Ohodnocené články:</h2>
            <form action="ohodnoceni.php" method="post">
                <table class='tablesirka'>
                
                <tr class="barvatabulky bila" ><td>Autor</td><td>Obsah</td><td>Známka</td><td>Aktuálnost</td><td>Originalita</td><td>Odborná úroveň</td><td>Jazyková úroveň</td></tr>
                    <?php                      
                        $sql = "SELECT Autorr,Obsahh,Hodoceni,Hodnoceni1,Hodnoceni2,Hodnoceni3,Hodnoceni4 FROM hodnoceni JOIN Rezervace WHERE hodnoceni.kontrol = Rezervace.ID_But AND But_stat=1 AND login='$hodnota';";
                          
                        $vysledek = mysqli_query($spojeni, $sql);

                        $i=0;
                        while (($radek = mysqli_fetch_assoc($vysledek)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 

                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autorr"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsahh"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["Hodoceni"]."</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["Hodnoceni1"]."</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["Hodnoceni2"]."</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["Hodnoceni3"]."</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["Hodnoceni4"]."</TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile;  
                                             //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
                    ?>  
                </table>
            </form>
        </div> 
    </center>
    
                
    
    
              
    
    <?php
     require 'footer.php';
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
