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
<title>Komunikační formulář</title>
</head>

<body>
<?php
        require("header.php");
     ?>

  <br /> <br />
  
  
 <center>
 <form method="get" action="" class="form_tvorba">
 <div class="form"> 
                <?php    /*
                        $sql = "INSERT INTO k_formular (ID,Nadpis,Autor,Pro,Datum,Text)
values('2','$_GET[Nadpis]','$_SESSION[Username]','$_GET[Pro]','2','$_GET[Text]')";   */

                ?>
    <h1>Vytvořit zprávu</h1>
     
      <h6 class="tyt">Přijemce:</h6><input maxlength="50" class="titulek" type="text" name="Pro" required > <hr>
    <h6 class="tyt">Obsah:</h6><textarea  style="resize: auto;" class="obsah" id="exampleFormControlTextarea1" name="Text"required></textarea><hr> 
      <h6 class="tyt">Přidat soubor:</h6><input type="file" id="myfile" name="myfile"><hr>
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Poslat zprávu </button>
  </div><br> </form>

<br><br><br>




<?php
require 'footer2.php';
?>


</body>
</html>

