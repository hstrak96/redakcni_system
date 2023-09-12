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
</style>
<title>Redakce</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>


<center>
<table width="70%">
<td>
<table class="table table-sm table-dark">
<tr>
<td colspan="2" align="center"><h2><b>Logos Polytechnikos</b></h2></td>
</tr>
<tr><td><a class="janevimž" href="1_cislo.php"><br><br><img height="75%" src="one.png" style="float: left"><h3>První číslo</h3><br><h5>Leden - Únor</h5>

<h5>Téma: Technika</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND ID_But<=9";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND ID_But<=9";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND ID_But<=9"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?> <br>
</td><td><a class="janevimž" href="2_cislo.php"><br><br><img height="75%" src="two.png" style="float: left"><h3>Druhé číslo</h3><br><h5>Březen - Duben</h5>
<h5>Téma: Zdravotnictví</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND (ID_But<=19 && ID_But>=9)";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND (ID_But<=19 && ID_But>=9)";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND (ID_But<=19 && ID_But>=9)"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?>
</td></tr>



</td></tr>
<tr><td><a class="janevimž" href="3_cislo.php"><br><br><img height="75%" src="three.png" style="float: left"><h3>Třetí číslo</h3><br><h5>Květen - Červen</h5>
<h5>Téma: Robotika</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND (ID_But<=29 && ID_But>=19)";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND (ID_But<=29 && ID_But>=19)";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND (ID_But<=29 && ID_But>=19)"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?> <br>
</td><td><a  class="janevimž" href="4_cislo.php"><br><br><img height="75%" src="four.png" style="float: left"><h3>Čtvrté číslo</h3><br><h5>Červenec - Srpen</h5>
<h5>Téma: Politika</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND (ID_But<=39 && ID_But>=29)";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND (ID_But<=39 && ID_But>=29)";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND (ID_But<=39 && ID_But>=29)"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?>
</td></tr>
</td></tr>
<tr><td><a class="janevimž" href="5_cislo.php"><br><br><img height="75%" src="five.png" style="float: left"><h3>Páté číslo</h3><br><h5>Září - Říjen</h5>
<h5>Téma: Příroda</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND (ID_But<=49 && ID_But>=39)";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND (ID_But<=49 && ID_But>=39)";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND (ID_But<=49 && ID_But>=39)"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?>   <br>
</td><td><a  class="janevimž" href="6_cislo.php"><br><br><img height="75%" src="six.png" style="float: left"><h3>Šesté číslo</h3><br><h5>Listopad - Prosinec</h5>
<h5>Téma: Auto - moto</h5></a><br>
<?php
$sql = "SELECT COUNT(INT_Stav) AS COUNTER0 FROM Rezervace WHERE INT_Stav=0 AND (ID_But<=59 && ID_But>=49)";
$sql2 = "SELECT COUNT(INT_Stav) AS COUNTER1 FROM Rezervace WHERE INT_Stav=1 AND (ID_But<=59 && ID_But>=49)";  
$sql3 = "SELECT COUNT(INT_Stav) AS COUNTER2 FROM Rezervace WHERE INT_Stav=2 AND (ID_But<=59 && ID_But>=49)"; 
$vysledek = mysqli_query($spojeni, $sql);
$vysledek2 = mysqli_query($spojeni, $sql2);
$vysledek3 = mysqli_query($spojeni, $sql3);
$radek = mysqli_fetch_assoc($vysledek);
$radek2 = mysqli_fetch_assoc($vysledek2);
$radek3 = mysqli_fetch_assoc($vysledek3);
echo ('Volných článků: '.$radek['COUNTER0'].'<br>');
echo ('Rezervovaných článků: '.$radek2['COUNTER1'].'<br>');
echo ('Zabraných článků: '.$radek3['COUNTER2'].'<br>');
?>
</td></tr>
<td>

</td><td>

</td>
</table></td></table></center>
<?php
 require 'footer.php';
?>
</body>
</html>
