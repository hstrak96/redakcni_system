<?php
  session_start();
  require("connect.php");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Rezervace WHERE INT_Stav='2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

$sql = "UPDATE Rezervace SET ID_Sub=$row[ID_But] WHERE ID_But='$row[ID_But]'";
mysqli_query($spojeni, $sql);
$sql2 = "INSERT INTO files (name, user) VALUES ('$row[ID_But]', '$_SESSION[Username]')";
mysqli_query($spojeni, $sql2);

 $myfile = fopen("/home/lupinci/uploads/" . $row['ID_But'].".txt", "w") or die("Unable to open file!"); 

 $txt = ($row['Clanek']."\n");
 fwrite($myfile, $txt);
 $txt = ($row['Autor']."\n");
 fwrite($myfile, $txt);
$txt = ($row['Obsah']."\n");
fwrite($myfile, $txt);

fclose($myfile);

$conn->close();
}}
echo('<a href="/home/lupinci/uploads/6.txt">hovno</a>');  

/*
 $myfile = fopen("newfile.txt", "w") or die("Unable to open file!"); 

$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>