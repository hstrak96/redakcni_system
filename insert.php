<?php
session_start();
  $duplicita=0;    
   $filename=null;
$uzi=$_SESSION["Username"];
// connect to the database
$conn = mysqli_connect('localhost', 'lupinci', 'Lup1nc12020*', 'lupinci');

        

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
   $destination = "/home/lupinci/uploads/" . $filename;
  //    $destination = "/home/korbel05/public_html/uploads/" . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];


    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    }else if (file_exists($destination)) {
  echo "Sorry, file already exists.";
  $duplicita=1;
 
}else if ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, user) VALUES ('$filename', '$uzi')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
      
//duplicita ošetřena     
  if($duplicita==0 || $filename==null){
             if($filename!=null){
$conn = new mysqli('localhost', 'lupinci', 'Lup1nc12020*', 'lupinci');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM files ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row["id"];
  }
}       }else{
  $id=0;
} 


   //Bláža
     
       
 require("connect.php");
 
  
 
 
 
  echo    $_POST[Name_clan];
  echo ("<br>") ;
  echo    $_POST[Prac_clan];
    echo ("<br>") ;
  echo    $_POST[Clan_clan];
    echo ("<br>") ;
  echo    $_POST[Obsah_clan];
    echo ("<br>");

    
    
    
$sql = "UPDATE Rezervace SET But_stat='1', INT_Stav='1', Autor='$_POST[Name_clan]', Pracoviste='$_POST[Prac_clan]', Clanek='$_POST[Clan_clan]', Obsah='$_POST[Obsah_clan]', USER='$_SESSION[Username]', ID_Sub='$id' WHERE ID_But=$_SESSION[ID]";

if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
} 

mysqli_close($spojeni);


       

header("Location: Redakce.php");exit;
}
             
header("Location: novy_clanek.php?star=$_SESSION[ID]");

exit;

    ?>
    