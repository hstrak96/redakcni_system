<?php
 require("connect.php");
 require("db_connect.php");
 session_start();
 $sql = "select * from login_redaktor Where Username = '".$_SESSION["Username"]."'";

 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
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
.ucet{
    padding: 1%;
    margin: 2%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    text-align:center;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    color: black;
    height:92%;
}
</style>
<title>Účet</title>
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
<td colspan="2" align="center"><h2><b>
<?php
echo('<h2>Účet: '.$_SESSION["Username"].'</h2> ');                                       
?></b></h2></td>
</tr>
<tr>

<td colspan="3" height="800px"><div class="ucet">
<?php
$sql2 = "select * from komentar WHERE komentar_login = admin";
$vysledek2 = mysqli_query($spojeni, $sql2);
$radek2 = mysqli_fetch_assoc($vysledek2);

$my_string = $radek2['komentar_text'];
$_SESSION["OOO"] = $my_string;
 
    switch ($_SESSION["Icon"]) {
 	case 1: echo('<img src="dogo.png" height="150px" align="left">');break;
    case 2: echo('<img src="roh.png" height="150px" align="left">');break;
    case 3: echo('<img src="lebkov.png" height="150px" align="left">');break;}

    echo('<h3><br>Login: '.$_SESSION["Username"].' <br/><br/>');
    echo('E-mail: '.$_SESSION["email"].'<br/><br/></h3>');
?>
</div></td>
</tr>               
<tr>
<td><h4>Téma</h4></td>      
<td><h4>Číslo</h4></td>
</tr>
<tr>
</table></td></table> 
</center>
</form>

<br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>