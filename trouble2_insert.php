 <?php
 session_start();
 print_r($_SESSION);
   if($_SESSION["Opravneni"] < 1){

 
header('Location: Index.php');
exit;
 }

 require("connect.php");
 
   $sql = "INSERT INTO trouble (Autor_zpravy,Prijemce,Zprava,Obsah_clanku)
values('$_SESSION[Username]','$_POST[Pro]','$_POST[Vyjadreni]','$_POST[nadpisclanku]')";
/*$sql = "INSERT INTO kontakt (Autor,Pro,Text)
values('$_SESSION[Username]','$_GET[Pro]','$_GET[Text]')";
    */
    /*
$sql = "INSERT INTO kontakt (Nadpis,Autor,Pro,Datum,Text)
values('','$_SESSION[Username]','$_GET[Pro]','','$_GET[Text]')";
         */
if (mysqli_query($spojeni, $sql)) {
    echo "Záznam byl úspešnì pøidán";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($spojeni);
}
mysqli_close($spojeni); 
header("Location: trouble_vypis.php");exit;
 ?>