
     
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
  h4, h6{
text-align:center;
padding-left:1%;
}

.nvm{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:20%;
 min-width:300px;
}


h1{color:#323232;}

 .op{
 display:none;
 }

 .disk{
 display:none;
 }

</style>
<title>Oprava novinky</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>
     <center>
  <?php
$val = $_POST['btn'];
  echo'<form name="myLetters" action="update.php" method="POST">';







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
  echo '<div class="nvm">';
  echo '<label class="text_mid" name="id" ><h4>Id: ' . $val . '</label></h4><br>';  
  echo '<label class="text_mid" name="datum" ><h6>Datum: ' . $row['datum'] .'</label></h6><br>';
  echo '<input id="titulek" class="op" name="id" value="' . $val . '"readonly><br>';
  echo '<input id="titulek" class="form-control" name="titulek" value="' . $row['titulek'] . '"><br>';
  echo '<div class="form-group">';
  echo '<textarea class="form-control col-xs-12" id="exampleFormControlTextarea1" rows="10" name="obsah" value="">' . $row['obsah'] . '</textarea><br>'; 
  echo '</div>';
  echo '<br><button type="submit" id="pokus" class="btn btn-outline-secondary "name="btn" value="1">Uložit</button></form>';
  echo '<center><form name="myLetters1" action="delete.php" method="POST"><input id="titulek" class="disk" name="id1" value="' . $val . '"readonly><br><button type="submit" class="btn btn-outline-secondary" id="pokus1" name="btn1" value="2">smazat</button></form>';
  echo '</div>';
}
   
} else {
echo "0 results";
}


            
    

?>

 </center>
<?php
 require 'footer.php';
?>
</body>
</html>

