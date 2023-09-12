        <?php
     session_start();
     require_once 'connect.php';
?>

     
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
   
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
 min-width:450px;
}


h1{color:#323232;}
</style>

<title>Kontaktní formulář</title>


</head>

<body>
<?php
        require("header.php");
       
      
      ?>

  <br /> <br />
 <center>
     <form method="get" action="insert2.php" class="form_tvorba">
<div class="form"> 
   
    <h1>Přidat zprávu</h1>

     <!-- <h6 class="tyt">Kategorie:</h6> 
      <select id="Kategorie" name="Kategorie">
        <option value="" disabled selected>Vyber možnost</option>
        <option value="1">1</option>
        <option value="2">Autor</option>
        <option value="3">Recenzent</option>
        <option value="4">Redaktor</option>
        <option value="5">Šéfredaktor</option>
        <option value="6">Admin</option>
        <option value="7">Údržba</option>
   
      </select> -->
      

<h6 class="tyt">Uživatelé:</h6> 
      <select id ="Pro" name="Pro">
<?php    



if (isset($_GET['pro'])) {
$pro=$_GET['pro'];
    echo "<option value='$pro'>$pro</option>";
}else{  
$my_string3 = $_GET["uziv"];

    $sql = "SELECT login FROM login_redaktor WHERE ID_Opr = '$my_string3'";
    $vysledek = mysqli_query($spojeni, $sql);
    $i=0;
    while ($radek = mysqli_fetch_assoc($vysledek)):
    echo "<option value='".$radek["login"]."'>".$radek["login"]. "</option>";
    endwhile;
      }

?>      
</select>
                   
      
       <hr>
    <h6 class="tyt">Obsah:</h6><textarea  style="resize: auto;" class="obsah" id="exampleFormControlTextarea1" name="Text"required></textarea><hr> 
  
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Poslat zprávu </button>
  </div><br> </form>

<br><br><br>
          



<?php
echo $opr; 
require 'footer2.php';
?>


</body>
</html>

                     