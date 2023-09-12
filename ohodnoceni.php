        <?php
     session_start();
     require_once 'connect.php';
     include 'filesLogic.php';

?>

     
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="main.css">


<style>
 .datum_style{
 text-align:right;
 color:red;
 }
  h4{
text-align:left;
padding-left:1%;
}

.form_tvorba{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:20%;
 

}

    select{
width: 50%; 
text-align: center;
 }
 
h1{color:#323232;}
</style>
<title>Ohodnocení článku</title>
</head>

<body>
<?php

        require("header.php");
       
      
      ?>


 <center>
 <br>    <br> <br>
     <form method="get" action="hodoceni_insert.php" class="form_tvorba">
  
     
<div class="form"> 
                <?php 
       $val = $_POST['btn'] ; 

$sql2 = "SELECT Autor,Obsah,ID_Sub FROM Rezervace WHERE ID_But= $val";
$vysledek2 = mysqli_query($spojeni, $sql2);
$radek2 = mysqli_fetch_assoc($vysledek2);
$my_string = $radek2['Autor'];
$my_string2 = $radek2['Obsah'];
$_SESSION["pokus"]=$my_string;
$_SESSION["pokus2"]=$my_string2;
$my_string3 = $radek2['ID_Sub'];  
$_SESSION["soubor"] = $radek2['ID_Sub'];     
 
                   /*
                        $sql = "INSERT INTO kontakt (ID,Nadpis,Autor,Pro,Datum,Text)
values('2','$_GET[Nadpis]','$_SESSION[Username]','$_GET[Pro]','2','$_GET[Text]')";   */

echo("<input type='hidden' name='haha' value='$val'>");
                ?>        
                          
              
    <h1>Ohodnocení článku</h1>
      <h6>Aktálnost, zajímavost, přínosnost:</h6>
      <select name="hodnoceni1" required >
       
       <option value="1">1</option> 
       <option value="2">2</option> 
       <option value="3">3</option> 
       <option value ="4">4</option> 
       <option value="5">5</option> 
       </select>
       <h6>Originalita:</h6>
      <select name="hodnoceni2" required>
       <option value="1">1</option> 
       <option value="2">2</option> 
       <option value="3">3</option> 
       <option value ="4">4</option> 
       <option value="5">5</option> 
       </select>
        <h6>Odborná úroveň:</h6>
      <select name="hodnoceni3" required>
       <option value="1">1</option> 
       <option value="2">2</option> 
       <option value="3">3</option> 
       <option value ="4">4</option> 
       <option value="5">5</option> 
       </select>
       <h6>Jazyková a stylistická úroveň:</h6>
      <select name="hodnoceni4" required>
       <option value="1">1</option> 
       <option value="2">2</option> 
       <option value="3">3</option> 
       <option value ="4">4</option> 
       <option value="5">5</option> 
       </select>       
        
       <?php
       if($my_string3 != 0){ 
       echo ("<div><br>");                                                       
       echo ("<a style=\"color: red;\" href=\"ohodnoceni.php?file_id='$my_string3'\" target=\"_blank\"><h5>Zobrazit dokument</h5></a>");
       echo ("</div>");  
       }
       ?>  
       


     
       
       
       
       <h6>Poznámky</h6>
       <textarea name="poznamky"></textarea>  <br><br>
       <h6>Celkové vyjádření:</h6>
         <select name="celkove" required>
       
       <option value="Schváleno">Schváleno</option> 
        <option value="Schávelno s výhradami">Schávelno s výhradami</option> 
       <option value="Neschváleno">Neschváleno</option> 
      
       </select>
          <br><br>  
  
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Přidat článek </button>
  </div><br> </form>

<br><br><br> <br><br> <br><br>   




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
