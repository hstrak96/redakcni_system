<?php
$val = $_POST['btn'];
  echo'<form name="myLetters" action="update.php" method="POST">';
echo $val."<br>";  


   if($_SESSION["Opravneni"] < 5){
 
header('Location: Index.php');
 }



$servername = "localhost";
$username = "lupinci";
$password = "Lup1nc12020*";
$dbname = "lupinci";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM novinky where novinky_id=$val";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  echo '<center><label id="id" name="id" >Id: ' . $val . '</label><br>';
  echo '<input id="titulek" name="id" value="' . $val . '"readonly><br>';
  echo '<input id="titulek" value="' . $row['titulek'] . '"><br>';
  echo '<input id="datum" name="datum" value="' . $row['datum'] . '"><br>';
  echo '<input id="obsah" name="obsah" value="' . $row['obsah'] . '"><br></center>'; 
  echo '<br><button type="submit" id="pokus" name="btn" value="1">upravit</button></form>';
}
} else {
echo "0 results";
}

$conn->close();
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
<title>Úprava novinky</title>
</head>

<body>
<nav class="navbar navbar-expand-md sticky-top">

<a class="navbar-brand" href="Index.php"><img src="logo.PNG" width="80" height="50"/></a>
<a class="navbar-brand" href="#"><b>logo</b></a>
<a class="navbar-brand" href="#"><b>logo</b></a>
<a class="navbar-brand" href="#"><b>logo</b></a>
<a class="navbar-brand" href="#"><b>logo</b></a>
<a class="navbar-brand" href="novinky11.php"><b>Pøidat Novinky</b></a>





<button class="navbar-toggler navbar-dark " type="button" data-toggle="collapse" data-target="#main-navigation">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="main-navigation">

<ul class="navbar-nav">





<li class="nav-item">
<a class="nav-link" href="#od3"><b>Pøihlášení</b></a>
<li class="nav-item">
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-light" type="submit">Search</button>
</form>
</li>
</ul>
</div>
</nav><br><br><br>


 <center>
<form method="post" class="form_tvorba">
<div class="form"> 

    <h1>Tvorba novinek</h1>
     <h6 class="tyt">Název:</h6></td><td><input maxlength="50" class="titulek" type="text" name="titulek" value="<?= htmlspecialchars($novinky['titulek']) ?>" /> <hr>
    <h6 class="tyt">Obsah:</h6></td><td><textarea minlength="50" style="resize: auto;" class="obsah" name="obsah"><?= htmlspecialchars($novinky['obsah']) ?></textarea><hr> 
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Pøidat </button>
  </div><br> </form>
<br><br><br>





<footer class="page-footer">

<div class="container">
<div class="row">

<div class="footer_second">
<h6>Developeøi</h6>
<p>Produck Owner: korbel05(Jenýk Korbel)</p>
<p>Scrum master: blazej04(Michal Blažejovský)</p>
<p>Member: straka07(Jan Straka)</p>
<p>Member: prihod12(Tadeáš Pøíhoda)</p>
<p>Member: kovali01(Jan Kovalík)</p>
<p>Member: servit01(Petr Servít)</p>
</div>

<div class="footer_second">
<h6>Nadpis</h6>
<p>text</p>
</div>

<div class="footer_second">
<h6>Nadpis</h6>
<p>text</p>
</div>

<div class="footer_second">
<h6>Nadpis</h6>
<p>text</p>
</div>

</div>
</div>
<div class="footer_lupinci">2020/2021 : tým Lupínci</div>
<div class="footer_odkaz">Odkaz na  <a><b>VSPJ</b></a></div>




</footer>



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
