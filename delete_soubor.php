<?php
 $conn = mysqli_connect('localhost', 'lupinci', 'Lup1nc12020*', 'lupinci');
                
$id= $_GET['remove_id'];

$sql = ("SELECT name FROM files WHERE id=$id");
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result); 
 
  
} else {
  echo "0 results";
}


unlink("/home/lupinci/uploads/".$row['name']);
    
$sql = ("DELETE FROM files WHERE id=".$_GET['remove_id']);
 if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

       // exit;    
?>

