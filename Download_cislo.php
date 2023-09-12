<?php
 session_start();
$cislos = $_POST['button1'];




 
  require("connect.php");
  switch ($cislos) {
    case 1: $min=1;  $max=8;  break;
    
    case 2: $min=11; $max=18; break;
    
    case 3: $min=21; $max=28; break;
    
    case 4: $min=31; $max=38; break;
    
    case 5: $min=41; $max=48; break;
    
    case 6: $min=51; $max=58; break;
    
  }
     $zip = new ZipArchive;
if ($zip->open('/home/lupinci/uploads/'.$cislos.'.zip', ZipArchive::CREATE) === TRUE)
{
  
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

                  //když není vytvořen soubor
    if($row['ID_Sub']==0){
    echo "ahoj";
       
        
    $myfile = fopen("/home/lupinci/uploads/$row[ID_But].txt", "w") or die("Unable to open file!");
$txt = "$row[Autor]\n";
fwrite($myfile, $txt);
$txt = "$row[Pracoviste]\n";
fwrite($myfile, $txt);
$txt = "$row[Clanek]\n";
fwrite($myfile, $txt);
$txt = "$row[Obsah]\n";
fwrite($myfile, $txt);
fclose($myfile);
 // Add files to the zip file
    $zip->addFile('/home/lupinci/uploads/'.$row[ID_But].'.txt');
    }else{
            //PDF add to zip
    
    
    
         echo $row[ID_Sub];
         $g=$row[ID_Sub];
         echo ("<br>");
              $sql1 = "SELECT name FROM files WHERE id=$g";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
    
    
     $zip->addFile('/home/lupinci/uploads/'.$row1[name]);
    
  }
} else {
  echo "0 results";
}
    

    
    }
                                 //do zipu-------------------------


}


    }
        // Add random.txt file to zip and rename it to newfile.txt
    $zip->addFile('random.txt', 'newfile.txt');
 
    // Add a file new.txt file to zip using the text specified
    $zip->addFromString('new.txt', 'text to be added to the new.txt file');
 
    // All files are added, so close the zip file.
    $zip->close();
     }
    
$conn->close();
  
    
  
  
  $file = '/home/lupinci/uploads/'.$cislos.'.zip';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
  

         // header('Location:/home/lupinci/uploads/1.zip');

 // header('Location:Prohlidka_cislo.php?cislo='.$cislos);
//exit;

?>