<?php
 require("connect.php");
 session_start();  
   if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/main.css">
<style>
#pokus{
  text-align:left:50%;
}
 .datum_style{
 text-align:right;
 color:red;
 }
  h4{
text-align:left;
padding-left:1%;
}
.redakce_pozadi{
    padding: 1%;
    margin: 2%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    text-align:center;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    color:black;
    text-align: center;
    display: grid;
    height: 80%;
    max-height: 80%;
    width: 95%;
    max-width: 95%;
    overflow: auto;    
}
/* width */
.redakce_pozadi::-webkit-scrollbar {
  width: 20px;
}

/* Track */
.redakce_pozadi::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #555555; 
  border-radius: 10px;
}
 
/* Handle */
.redakce_pozadi::-webkit-scrollbar-thumb {
  background: #DB2C23; 
  border-radius: 10px;
}

/* Handle on hover */
.redakce_pozadi::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}

input:hover + label img,
input:checked + label img{
border-radius: 50%;
box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
opacity: 0.5;
transition: .5s ease;
animation-fill-mode: forwards; 
}
.hid{
display:none;
}
.obryz{
position:relative;
top: 25%;
}
</style>
<title>3. číslo</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>
<form ACTION="novy_clanek.php">
<center>
<table width="70%">
<td>
<table class="table table-sm table-dark">
<tr>
<td colspan="2" align="center"><h2><b>Logos Polytechnikos</b></h2></td>
</tr>
<tr>

<td rowspan="2" height="130px" width="50%"><div class='redakce_pozadi'>
 <?php
 $sql = "select * from Rezervace Where ID_But = 21";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="21" id="star21" required>
        <label for="star21">
        <img class="obryz" src="free.png">
        </label> 
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
<td height="130px"><div class='redakce_pozadi'>       
        <?php
 $sql = "select * from Rezervace Where ID_But = 22";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="22" id="star22">
        <label for="star22">
        <img class="obryz" src="free.png">
        </label>
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>
<tr>
<td height="130px"><div class='redakce_pozadi'>
<?php
 $sql = "select * from Rezervace Where ID_But = 23";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="23" id="star23">
        <label for="star23">
        <img class="obryz" src="free.png">
        </label>
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>
<tr>
<td height="130px">&nbsp;</td>
<td rowspan="3" height="130px"><div class='redakce_pozadi'>
        <?php
 $sql = "select * from Rezervace Where ID_But = 24";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];
 
if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="24" id="star24">
        <label for="star24">
        <img class="obryz" src="free.png">
        </label> 
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>
<tr>
<td height="130px"><div class='redakce_pozadi'>
        <?php
 $sql = "select * from Rezervace Where ID_But = 25";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="25" id="star25">
        <label for="star25">
        <img class="obryz" src="free.png">
        </label> 
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>
<tr>
<td height="130px">&nbsp;</td>
</tr>
<tr>
<td height="150px"><div class='redakce_pozadi'>
        <?php
 $sql = "select * from Rezervace Where ID_But = 26";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="26" id="star26">
        <label for="star26">
        <img class="obryz" src="free.png">
        </label> 
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
<td height="150px"><div class='redakce_pozadi'>
        <?php
 $sql = "select * from Rezervace Where ID_But = 27";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="27" id="star27">
        <label for="star27">
        <img class="obryz" src="free.png">
        </label>
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>
<tr>
<td colspan="2" height="150px"><div class='redakce_pozadi'>
        <?php
 $sql = "select * from Rezervace Where ID_But = 28";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $mez =  $radek['But_stat'];$mez2 =  $radek['INT_Stav'];

if ($mez == 0) 
echo('
        <input class="hid" type="radio" name="star" value="28" id="star28">
        <label for="star28">
        <img src="free.png">
        </label>
');
if ($mez2 == 2) {
echo('<h5><br/><br/>Autor: '.$radek['Autor'].' ');
echo('Pracoviště: '.$radek['Pracoviste'].'<br/><br/>');
echo('Název článku: '.$radek['Clanek'].'<br/><br/>');
echo('Obsah </h5><h6>'.$radek['Obsah'].'<br/></h6>');
} else if ($mez2 == 1) {
echo('<p><img height="150px" class="obryz" src="zar.png"></p>');
}
?>
</div></td>
</tr>               
<tr>
</tr>
<tr>
<td><h4>Téma: Robotika</h4></td>      
<td><h4>Číslo: 3</h4></td>
</tr>
<tr>
</table></td></table>


<button style="width:70%; height:10%; " type="submit" class="btn btn-danger"><h3><b>Kliknutím na ikonu si vyberte místo v čísle a zde potvrďte</b></h3></button> 
</center>
</form>

<br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>