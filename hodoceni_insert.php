 <?php
 session_start();
$val = $_GET['haha'];   
 require("connect.php");
 require("db_connect.php");
print_r($_SESSION);

 $hodnota = $_SESSION["Username"];
 $my_string4 = $_GET['celkove'];
 $pdo->query("UPDATE `hodnoti` SET `done` = '1' WHERE `hodnoti`.`ID_clanek` =".$val. " AND `hodnoti`.`recenzent1` = '".$hodnota."';");
 
 
 
if($my_string4 == "Neschváleno"){
$sql3 = "SELECT * FROM Rezervace WHERE ID_But=$val";
 $vysledek3 = mysqli_query($spojeni, $sql3);
 $radek3 = mysqli_fetch_assoc($vysledek3);
 
    $sql = "INSERT INTO zamitnute (Stav,Vyjadreni,zapsal,zamitnul, Obsah, Nazev, Autor) 
values('Neschváleno','$_GET[poznamky]','$radek3[USER]','$hodnota','$_SESSION[pokus2]','$radek3[Clanek]','$_SESSION[pokus]')";

$sql2 = "UPDATE Rezervace SET But_stat='0', INT_Stav='0', Autor='', Pracoviste='---', Clanek='', Obsah='', USER='', ID_Sub='0' WHERE ID_But=$val";

$sql4 = "INSERT INTO historie (Login, Uprava) VALUES ('$hodnota','Neschvalen clanek s id:$val')";

$pdo->query( "INSERT INTO `kontakt` (`Autor`, `Pro`, `Datum`, `Text`, `ID_zobrazeno`) VALUES (NULL, '$radek3[USER]', CURRENT_TIMESTAMP, 'Váš článek byl zamítnut. Poznámky recenzenta: $_GET[poznamky]', '1')");
if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
} 

if (mysqli_query($spojeni, $sql2)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spojeni);
}

if (mysqli_query($spojeni, $sql3)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($spojeni);
}
if (mysqli_query($spojeni, $sql4)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql4 . "<br>" . mysqli_error($spojeni);
}

mysqli_close($spojeni);

$conn = mysqli_connect('localhost', 'lupinci', 'Lup1nc12020*', 'lupinci');
                
$id= $_SESSION["soubor"];

$sql = ("SELECT name FROM files WHERE id=$id");
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result); 
 
  
} else {
  echo "0 results";
}


unlink("/home/lupinci/uploads/".$row['name']);
    
$sql = ("DELETE FROM files WHERE id=$id");
 if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
    }

$conn->close();  
header("Location: hodnoceni_tabulka.php");exit;
} else {

   $sql = "INSERT INTO hodnoceni (kontrol,Autorr,Obsahh,Hodoceni,Hodnoceni1,Hodnoceni2,Hodnoceni3,Hodnoceni4,Poznamka,login) 
values('$val','$_SESSION[pokus]','$_SESSION[pokus2]','$_GET[celkove]','$_GET[hodnoceni1]','$_GET[hodnoceni2]','$_GET[hodnoceni3]','$_GET[hodnoceni4]','$_GET[poznamky]','$hodnota')";

   $sql2 = "UPDATE Rezervace SET INT_Stav='2' WHERE ID_But=$val";

   $sql5 =  "INSERT INTO historie (Login, Uprava) VALUES ('$hodnota','Shvalen clanek s id:$val')";



/*$sql = "INSERT INTO kontakt (Autor,Pro,Text)
values('$_SESSION[Username]','$_GET[Pro]','$_GET[Text]')";
    */
    /*
$sql = "INSERT INTO kontakt (Nadpis,Autor,Pro,Datum,Text)
values('','$_SESSION[Username]','$_GET[Pro]','','$_GET[Text]')";
         */
         
if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
} 

if (mysqli_query($spojeni, $sql2)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($spojeni);
}   
if (mysqli_query($spojeni, $sql5)) {
    echo "Záznam byl úspešně přidán";
} else {
    echo "Error: " . $sql5 . "<br>" . mysqli_error($spojeni);
}          
mysqli_close($spojeni); 
echo $val; 
header("Location: hodnoceni_tabulka.php");exit;
}




 ?>