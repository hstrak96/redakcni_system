<?php
 require("connect.php");
?>
<?php
$val3 =  $_GET['star'];

$pass = hash_hmac('sha256', "$_GET[passwd]","salt");
?>
<?php
$sql = "INSERT INTO login_redaktor (login,heslo,email,icon)
values('$_GET[user]','$pass','$_GET[email]','$val3')";
?>

<style>
.form
{

position: relative;
background-image: url(form.png);
background-repeat: no-repeat;
background-position: center;
height: 80%;
text-align: center;

}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
 <HTML>                           
 <HEAD>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/main.css">
<title>Registrace</title>
 </HEAD>
 <BODY>  
 <?php
  require 'header.php';
 ?>
<h3> <br><br><br><br><br><br><br><br><br><br><br>
<?php
  

 if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Bohužel, váš účet nebylo možné vytvořit";
} ?>
</h3>
<br><br><br>
<a href="Index.php"><button class="btn btn-secondary"> Zpět na hlavní stránku </button></a>
 </div></BODY>
 

                                                                                                               <br>
<?php
 require 'footer2.php';
?>
 </HTML>







