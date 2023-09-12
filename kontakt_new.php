<?php
session_start();
require("connect.php");

                        
if($_SESSION["Opravneni"] < 1){
header('Location: Index.php');
exit;
 }else{
 if($_SESSION["Zobrazeno"] == 1){

$sql = "UPDATE kontakt SET ID_zobrazeno='0' WHERE Pro='$_SESSION[Username]'";

mysqli_query($spojeni, $sql);
$_SESSION["Zobrazeno"] = 0; 
}
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
        
        <title>Zprávy</title>
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
            <div>
                <h2>Zprávy</h2>
            </div>
            <br>
            
            
                        <?php
$jmeno=$_SESSION['Username'];                        
$sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' ORDER BY Datum DESC";
$vysledek = mysqli_query($spojeni, $sql);
$i=0;
if ($vysledek->num_rows > 0) {
echo(' <div class="table-responsive">
<table class="tablesirka">
<tr class="barvatabulky bila" ><td>Pro</td><td>Autor</td><td>Text</td><td>Datum</td><td>Odpověď</td></tr>
');
while ($radek = mysqli_fetch_assoc($vysledek)):

if (($i%2)==1)    // sude aliche radky maji jinou platnost
       echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
else
       echo "<TR VALIGN=CENTER>";

echo "<TD  ALIGN=CENTER>".$radek["Pro"]. "</TD>";
echo "<TD  ALIGN=CENTER><a href=\"konverzace.php?kont=$radek[Autor]\">".$radek["Autor"]. "</a></TD>";
echo "<TD  ALIGN=CENTER>".$radek["Text"].  "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Datum"].  "</TD>";   



         // Dělal Honza







  $sql1 = "SELECT ID_Opr FROM login_redaktor WHERE login='$radek[Autor]'";
$vysledek1 = mysqli_query($spojeni, $sql1);

if ($vysledek1->num_rows > 0) {

while ($radek1 = mysqli_fetch_assoc($vysledek1)){





echo "<TD  ALIGN=CENTER><a class='btn btn-danger' href='kontakt_formular.php?uziv=$radek1[ID_Opr]&pro=$radek[Autor]'>Odpověď</a></TD>";


}

 }else{
 echo "<TD  ALIGN=CENTER>Automaticky generováno</TD>";
 }




      //až sem











 $i=$i+1;     
endwhile;
} else {
echo ('<h5>Nebyly nalezeny žádné zprávy</h5>');
}


?>  
            
            </table></div>
        </div>
        
<?php
 if($_SESSION["Opravneni"] == 3){
 
 echo('

        
                 <form action="ohodnoceni.php" method="post">
                <div class="forum">
             <div>
              <h2>Hodnocení</h2>
             </div>
            <br>
            
                       ');
                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql = "SELECT * FROM Rezervace join hodnoti on Rezervace.ID_But=hodnoti.ID_clanek where recenzent1='".$hodnota."' and done=0;";  
                        $vysledek = mysqli_query($spojeni, $sql);

                        $i=0;
                                                if ($vysledek->num_rows > 0) {
                        echo('
                                 <div class="table-responsive">
                        <table class="tablesirka">
                
                <tr class="barvatabulky bila" ><td>Autor</td><td>Obsah</td><td>Termín dodání</td><td>Ohodnocení</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 
                                                if($radek["Autor"]==null) {
                                                    echo "<TD  name='pokus' ALIGN=CENTER>---</TD>";
                                                } else {
                                                   echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>"; 
                                                }
                        
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["datum"]. "</TD>";
                        echo "<TD  ALIGN=CENTER><button class='btn-danger left' name='btn' type='submit' value=". $radek['ID_But'] .">Ohodnotit</button></TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile; 
                        } else {
                        echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
                </table></div></form>');
           
                        } else  if($_SESSION["Opravneni"] == 4){
     
 echo('

        
                 <form action="redakce_hodnoceni.php" method="post">
                <div class="forum">
             <div>
              <h2>Články čekající na přiřazení recenzentů</h2>
             </div>
            <br>
            
                       ');
                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql1 = "SELECT * FROM `Rezervace` WHERE id_mezistav='0' AND clanek<>''";  
                        $vysledek1 = mysqli_query($spojeni, $sql1);

                        $i=0;
                        if ($vysledek1->num_rows > 0) {
                        echo('
                        <div class="table-responsive">
                        <table class="tablesirka">
                        <tr class="barvatabulky bila" ><td>Autor</td><td>Název</td><td>Pracoviště</td><td>Obsah</td><td>Ohodnocení</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek1)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 
                        
                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Clanek"]. "</TD>";  
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Pracoviste"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";

                        echo "<TD  ALIGN=CENTER><button class='btn-danger left' name='id' type='submit' value=". $radek['ID_But'] .">Přiřadit</button></TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile;  
                        } else {
                        echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
               </table></div></form><br>
                   <h2>Čekající ohodnocení</h2><br>'
                   );

                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql = "SELECT * FROM Rezervace join hodnoti on Rezervace.ID_But=hodnoti.ID_clanek where done=0;";  
                        $vysledek = mysqli_query($spojeni, $sql);

                        $i=0;
                                                if ($vysledek->num_rows > 0) {
                        echo('
                                  <div class="table-responsive">
                        <table class="tablesirka">
                
                <tr class="barvatabulky bila" ><td>Autor</td><td>Recenzent</td><td>Obsah</td><td>Termín dodání</td><td>Instrukce</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 

                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["recenzent1"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["datum"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["pozn"]. "</TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile; 
                        } 
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
                </table></div>');
                   
           
 } 
 if(($_SESSION["Opravneni"] >= 5)) {
              echo('
                        <form action="redakce_hodnoceni.php" method="post">
                <div class="forum">
             <div>
              <h2>Schválené články</h2><br>
             </div>
            ');
                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql1 = "SELECT * FROM `Rezervace` WHERE Int_stav='2';";  
                        $vysledek1 = mysqli_query($spojeni, $sql1);

                        $i=0;
                        if ($vysledek1->num_rows > 0) {
                        echo('
                                  <div class="table-responsive">
                        <table class="tablesirka">
                        <tr class="barvatabulky bila" ><td>Autor</td><td>Obsah</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek1)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 

                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile;  
                        } else {
                        echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
               
               </table></div></form><br/>
                   <h2>Čekající ohodnocení</h2><br>'
                   );

                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql = "SELECT * FROM Rezervace join hodnoti on Rezervace.ID_But=hodnoti.ID_clanek where done=0;";  
                        $vysledek = mysqli_query($spojeni, $sql);
                        if ($vysledek->num_rows > 0) {
                        $i=0;
                                                if ($vysledek->num_rows > 0) {
                        echo('
                                  <div class="table-responsive">
                        <table class="tablesirka">
                
                <tr class="barvatabulky bila" ><td>Autor</td><td>Recenzent</td><td>Obsah</td><td>Termín dodání</td><td>Instrukce</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 
                         
                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["recenzent1"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["datum"]. "</TD>";
                        echo "<TD  ALIGN=CENTER>".$radek["pozn"]. "</TD>";
                        echo "</TR>";
                         $i=$i+1;     
                        endwhile; 
                        } 
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
                </table></div>');
                        } else {
                            echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
                   <form action="redakce_hodnoceni.php" method="post">
                <br><br>
             <div>
              <h2>Články čekající na přiřazení recenzentů</h2>
             </div>
            <br>
            
                       ');
                        $hodnota = $_SESSION["Username"];

                        //$sql = "SELECT * FROM Rezervace WHERE But_stat=1 AND COUNT(kont)<2 AND login != $hodnota";
                        //$sql = "SELECT * FROM Rezervace JOIN hodnoceni WHERE But_stat=1 AND Obsah = Obsahh AND login = $hodnota";  
                        $sql1 = "SELECT * FROM `Rezervace` WHERE id_mezistav='0' AND clanek<>''";  
                        $vysledek1 = mysqli_query($spojeni, $sql1);

                        $i=0;
                        if ($vysledek1->num_rows > 0) {
                        echo('          <div class="table-responsive"><table class="tablesirka">
                        <tr class="barvatabulky bila" ><td>Autor</td><td>Název</td><td>Pracoviště</td><td>Obsah</td><td>Ohodnocení</td></tr>');
                        while (($radek = mysqli_fetch_assoc($vysledek1)) ):

                        if (($i%2)==1)    // sude aliche radky maji jinou platnost
                               echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
                        else
                               echo "<TR VALIGN=CENTER>"; 

                        echo "<TD  name='pokus' ALIGN=CENTER>".$radek["Autor"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Clanek"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Pracoviste"]. "</TD>";
                        echo "<TD  name='pokus2' ALIGN=CENTER>".$radek["Obsah"]. "</TD>";

                        echo "<TD  ALIGN=CENTER><button class='btn-danger left' name='id' type='submit' value=". $radek['ID_But'] .">Přiřadit</button></TD>";
                        echo "</TR>";
                         $i=$i+1;
                            
                        endwhile;  
                        } else {
                        echo ('<h5>Nebyly nalezeny žádné články k ohodnocení</h5>');
                        }
                        //".$radek["Hodnoceni"]."   NAURAL JOIN hodnoceni
           echo('          
               </table></div></form>');
               
     
 }
?>                
        
    </center>
    
</body>
</html>
