        <?php
     session_start();
     require_once 'connect.php';

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


h1{color:#323232;}
</style>
<title>Formulář k vyjádření</title>
</head>

<body>
<?php
        require("header.php");
       
      
      ?>

  <br /> <br />
 <center>
     <form method="post" action="trouble2_insert.php" class="form_tvorba">
<div class="form"> 
                <?php    /*
                        $sql = "INSERT INTO kontakt (ID,Nadpis,Autor,Pro,Datum,Text)
values('2','$_GET[Nadpis]','$_SESSION[Username]','$_GET[Pro]','2','$_GET[Text]')";   */

                ?>
    <h1>Přidat zprávu</h1>
         <h6 class="tyt">Příjemce:</h6><select name="Pro">
           

 
    
      
    
    <?php
     $jmeno=$_SESSION['Username']; 
    $sql = "SELECT login FROM login_redaktor WHERE login != '$jmeno'";
    $vysledek = mysqli_query($spojeni, $sql);
    $i=0;
    while ($radek = mysqli_fetch_assoc($vysledek)):
    echo "<option value='".$radek["login"]."'>".$radek["login"]. "</option>";
    endwhile;
       ?>
      </select> <hr>
      <h6 class="tyt">Nadpis článku:</h6><input maxlength="50" class="titulek" type="text" name="nadpisclanku"  /> <hr>
    <h6 class="tyt">Vyjádření:</h6><textarea  style="resize: auto;" class="obsah" id="exampleFormControlTextarea1" name="Vyjadreni"required></textarea><hr> 
  
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Poslat zprávu </button>
  </div><br> </form>

<br><br><br>




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
