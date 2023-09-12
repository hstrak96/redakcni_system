<?php
require ("connect.php");

 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM novinky";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["novinky_id"]. " - Titulek: " . $row["titulek"]. " " . $row["obsah"]. " " .$row["datum"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>