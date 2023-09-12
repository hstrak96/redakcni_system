<?php
session_start();                  
$val3 =  $_POST['id1'];
$hodnota = $_SESSION["Username"];
$servername = "localhost";
$username = "lupinci";
$password = "Lup1nc12020*";
$dbname = "lupinci";

  if($_SESSION["Opravneni"] < 5){
 
header('Location: Index.php');
exit;
  }
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM novinky WHERE novinky_id=$val3";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO historie (Login, Uprava) VALUES ('$hodnota','Odstraneno id:$val3' ) ";
 
           

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
