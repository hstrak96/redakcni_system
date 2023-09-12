<?php
 require("connect.php");
 $salt="salt"; 
 
 $protected="Index.php";
 $css="styles.css";

 $sql = "select heslo,ID_Opr,icon,email from login_redaktor Where login='".$_POST['user']."'";
 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
 $my_string = $radek['ID_Opr'];
 $my_string2 = $radek['icon'];
 $my_string3 = $radek['email'];

 
 
 if ($_GET['action']=='validate'){
   if((hash_hmac('sha256', $_POST['passwd'],$salt)==$radek['heslo'])){
     session_start();
     header("Cache-control: private");
     $_SESSION["user_is_logged"] = 1;
     $_SESSION["Opravneni"] = $my_string;
     $_SESSION["Icon"] = $my_string2;
     $_SESSION["Username"] = $_POST['user'];
     $_SESSION["email"] = $my_string3;
    
    

     header("Location:".$protected);     
     exit;
   }
 }       
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
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>
 <link href="bootstrap/css/bootstrap.css" media="all" type="text/css" rel="stylesheet">
  <link href="styly.css" media="all" type="text/css" rel="stylesheet">
  <link href="main.css" media="all" type="text/css" rel="stylesheet">
  <title>Přihlášení</title>
 </HEAD>
 <BODY>
 <?php
  require 'header.php';
 ?>  
<form action="./login.php?action=validate" method="post">
<div class="form">       
<br><br><br><br><br><br><br><br><br><br><br><br>
    <h5>Login:&nbsp;&nbsp;<input type="text" name="user" /></h5> <br>
    <h5>Heslo:&nbsp;&nbsp;<input type="password" name="passwd" /></h5> <br><br><br><br><br><br>
    <button type="submit" class="btn btn-outline-light" value="Login" /> Přihlášení </button> 
 </div></form>
 </BODY>
                <br>

 
 <?php
  require 'footer.php';
 ?>
 </HTML>






