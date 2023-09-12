<?php

session_start();
      if($_SESSION["Opravneni"] < 5){
 
header('Location: Index.php');
exit;
 }


$hodnota = $_SESSION["Username"];



$val = $_POST['btn'];
$val2 = $_POST['obsah'];
$val3 =  $_POST['id'];
$val4 =  $_POST['titulek'];
//echo $val;
//echo "<br>";
//echo $val2; 
//echo "<br>";
//echo $val3; 



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

$sql = "UPDATE novinky SET obsah='$val2', titulek='$val4' WHERE novinky_id=$val3";

           

if ($conn->query($sql) === TRUE) {

$message = "Record updated successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
} else {   
$message = "Error updating record: " . $conn->error;
  echo "<script type='text/javascript'>alert('$message');</script>";
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO historie (Login, Uprava) VALUES ('$hodnota','$val2' ) ";
 
           

if ($conn->query($sql) === TRUE) {

$message = "Record updated successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
} else {   
$message = "Error updating record: " . $conn->error;
  echo "<script type='text/javascript'>alert('$message');</script>";
}

$conn->close();


 
       
      

            

 header("Location: Index.php");exit; 
?>