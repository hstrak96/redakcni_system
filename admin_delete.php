<?php
require("db_connect.php");

  if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
}

if($_GET['tb']=="komentar"||$_GET['tb']=="tema") {
    
    $statement = "DELETE FROM ".$_GET['tb']." WHERE ".$_GET['idcol']." = ".$_GET['id']." ;";
            $pdo->query($statement);
}




header('Location: admin.php?tb='.$_GET[tb]);
 die;
?>