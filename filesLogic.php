<?php
session_start();
$uzi=$_SESSION["Username"];
//echo realpath('uploads') . PHP_EOL;
//echo ("<br>");
// ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//echo $_SERVER['DOCUMENT_ROOT']; 
//echo ("<br>");
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


    //-------------------------------------download-----------------------------



if (isset($_GET['file_id'])&&($_GET['typ'])) {
    $id = $_GET['file_id'];
      $sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '/home/lupinci/uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('/home/lupinci/uploads/' . $file['name']));
        readfile('/home/lupinci/uploads/' . $file['name']);

        // Now update downloads count
      
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
    
    
    //-------------------------------------show----------------------------------
    
    
    
$conn = mysqli_connect('localhost', 'lupinci', 'Lup1nc12020*', 'lupinci');
// connect to database


$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);





if (isset($_GET['file_id'])) {                   
    $id = $_GET['file_id'];
           
    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '/home/lupinci/uploads/' . $file['name']; 
       $nam= $file['name'];
    if (file_exists($filepath)) {
      $url =$filepath;
      
      
      
      
      
         //nove
      
      
      
      
      
      
         $filename = $nam;

    // destination of the file on the server
   $destination = "/home/lupinci/uploads/" . $filename;
  //    $destination = "/home/korbel05/public_html/uploads/" . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

   

                // rozpoznani formatu
    if (in_array($extension, ['docx'])) {
       
        
         $content = file_get_contents($url);

   header('Content-Description: File Transfer');
   header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
     //   header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize('/home/lupinci/uploads/' . $file['name']));
         ob_clean();
        flush();
        readfile('/home/lupinci/uploads/' . $file['name']);

    die($content);
        
        
         // konec noveho
        
        
    }else{
      
      
      
      
      
      

      
      
      
      
      
      
    $content = file_get_contents($url);

    header('Content-Type: application/pdf');
    header('Content-Length: ' . strlen($content));
    header('Content-Disposition: inline; filename="YourFileName.pdf"');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    ini_set('zlib.output_compression','0');

    die($content);
    }    /*
        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;   */
    }

}
?>