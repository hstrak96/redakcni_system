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
            
              <div class="table-responsive">
                  <table style="border: none;" >
                  <tr class="barvatabulky bila" >
                  <td><a class="navbar-brand" href="konverzace.php?kont=<?php echo ($_GET['kont'].'&zobrazeni=vse'); ?>">Vše</a></td>
                   <td><a class="navbar-brand" href="konverzace.php?kont=<?php echo ($_GET['kont'].'&zobrazeni=dorucene'); ?>">Doručené</a></td>
                    <td><a class="navbar-brand" href="konverzace.php?kont=<?php echo ($_GET['kont'].'&zobrazeni=odeslane'); ?>">Odeslané</a></td>
                  </tr>
                  </table>
              
                 </div>
              
              
  
            <br>
                     
            
                        <?php
$jmeno=$_SESSION['Username'];     
$kont=$_GET['kont'];

          switch($_GET['zobrazeni']){
          case 'dorucene':$sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' AND Autor='$kont' ORDER BY Datum DESC"; break;
          case 'odeslane':$sql = "SELECT * FROM kontakt WHERE Pro='$kont' AND Autor='$jmeno' ORDER BY Datum DESC"; break;
          case 'vse':$sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' AND Autor='$kont' OR Autor='$jmeno' AND Pro='$kont' ORDER BY Datum DESC"; break;
            default: $sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' AND Autor='$kont' OR Autor='$jmeno' AND Pro='$kont' ORDER BY Datum DESC";
                  }

//$sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' AND Autor='$kont' OR Autor='$jmeno' AND Pro='$kont' ORDER BY Datum DESC"; //vse
                  
//$sql = "SELECT * FROM kontakt WHERE Pro='$jmeno' AND Pro='$jmeno' OR Autor= ORDER BY Datum DESC";
$vysledek = mysqli_query($spojeni, $sql);
$i=0;
if ($vysledek->num_rows > 0) {
echo('
<table class="tablesirka">
<tr class="barvatabulky bila" ><td>Pro</td><td>Autor</td><td>Text</td><td>Datum</td><td>Odpoěď</td></tr>
');
while ($radek = mysqli_fetch_assoc($vysledek)):

if (($i%2)==1)    // sude aliche radky maji jinou platnost
       echo "<TR VALIGN=CENTER BGCOLOR=SILVER>";
else
       echo "<TR VALIGN=CENTER>";

echo "<TD  ALIGN=CENTER>".$radek["Pro"]. "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Autor"]. "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Text"].  "</TD>";
echo "<TD  ALIGN=CENTER>".$radek["Datum"].  "</TD>";   



         // Dělal Honza  odpovědět tlačítko

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
            
            </table>
        </div>
        
        
        
        
        
    </center>
    
    
    
<footer class="page-footer" style="display: block; bottom: 0;  background-color: #555555; width:100%;">

<div class="container">
<div class="row">

<div class="footer_second">
<h6>Developeři</h6>
<p>Produck Owner: korbel05(Jenýk Korbel)</p>
<p>Scrum master: blazej04(Michal Blažejovský)</p>
<p>Member: servit01(Petr Servít)</p>
</div>

<div class="footer_second">
<h6>Developeři</h6>
<p>Member: straka07(Jan Straka)</p>
<p>Member: prihod12(Tadeáš Příhoda)</p>
<p>Member: kovali01(Jan Kovalík)</p>
</div>

<div class="footer_second">
<h6></h6>
</div>

</div>
</div>
<div class="footer_lupinci">2020/2021 : tým Lupínci</div>
<div class="footer_odkaz">Odkaz na  <a href="https://www.vspj.cz/"  style="text-decoration:none; color: #FDF5E6;"><b>VSPJ</b></a></div>




</footer>
    
</body>
</html>

