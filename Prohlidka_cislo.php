<?php

 session_start();
 include 'filesLogic.php';  
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
td {
  text-align: center;
  vertical-align: middle;
}
a {
  color: white;
}
.janevimž:hover {
  color: silver;
  transition: .5s ease;
  animation-fill-mode: forwards;
}

.prohlidka_vypis{
    padding: 1%;
    margin: 1%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    width:80%;
    text-align:center;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    display: inline-block;
    min-width: 470px;
}

.box {
  width: 20%;
  float: left;
  background: #DB2C23;
  margin: 12;
  height: 20%;
  width: 15%;
  border-radius:15px;
  min-width: 200px;
}
.text20{
color:#1b191f;
font-size:5em;
text-shadow: 1px 1px 4px #696969;
}
</style>
<title>Prohlídka</title>
</head>

<body>
<img style="width:100%;" src="DeeThane.jpg">
<?php
 require 'header.php';
?><br><br>
 <center>

<p class="text20">Procházíte číslo <?php echo $_GET["cislo"];?> </p>  <h1><br><br>
    <div class="row">
      <div class="col"> 
      <form name="myLetters" action="Download_cislo.php" method="POST"> 
        <button type="submit" name="button1" class="btn btn-outline-danger" value="<?php echo $_GET["cislo"];?>" ><h4>Stažení celého čísla</h4></button> 
               </form> </div>
      <div class="col"></div>
      <div class="col"></div>
    
  
    </div>
    
    

    
    
  <?php
   require("connect.php");
  switch ($_GET["cislo"]) {
    case 1: $min=1;  $max=8;  break;
    
    case 2: $min=11; $max=18; break;
    
    case 3: $min=21; $max=28; break;
    
    case 4: $min=31; $max=38; break;
    
    case 5: $min=41; $max=48; break;
    
    case 6: $min=51; $max=58; break;
    
  }
  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Rezervace WHERE ID_But <=$max AND ID_But >=$min AND INT_Stav=2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$my_string3 = $row['ID_Sub'];
echo " <center> <div class='prohlidka_vypis'>";
echo ("
<div class=\"row\">
<div class=\"col\">
<h3>$row[Autor]</h3>
</div>
<div class=\"col\">

</div>
<div class=\"col\">
<h3>$row[Pracoviste]</h3>
</div>
</div>
<div class=\"row\">
<div class=\"col\">
$row[Clanek] 
</div>
</div>
<div class=\"row\">
&nbsp;
</div>
<div class=\"row\">
<div class=\"col\">
<h4><center>$row[Obsah]</center></h4>
</div>
</div>
<div class=\"row\">
&nbsp;
</div>
<div class=\"row\">
<div class=\"col\">
");
if ($my_string3 > 0){
echo ("<center><a style=\"color: red;\" href=\"Prohlidka_cislo.php?file_id='$my_string3'\" target=\"_blank\"><h3>Zobrazit dokument</h3></a></center>");
}
echo ("
</div></div>
");
echo " </center> </div>";
}
} else {
echo ('<br> Nebyly nalezeny žádné články');
}
$conn->close();
  
  ?>
 
 </h1>

 </center>
 <br><br><br><br><br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>
