<?php
require("db_connect.php");
require("connect.php");

  if($_SESSION["Opravneni"] < 6){
 
header('Location: Index.php');
}

if($_GET['tb']=="komentar"||$_GET['tb']=="tema"||$_GET['tb']=="novinky"||$_GET['tb']=="Rezervace"||$_GET['tb']=="hodnoceni") {
    if($_GET['tb']=="Rezervace") {
        $sql1 =("SELECT * FROM `Rezervace` join files on Rezervace.ID_sub=files.id WHERE ID_But=".$_GET['id'].";");
        $vysledek1 = mysqli_query($spojeni, $sql1);
        if ($vysledek1->num_rows > 0) {
            $radek = mysqli_fetch_assoc($vysledek1);
            $_GET['remove_id']=$radek[ID_Sub];
            require("delete_soubor.php");
        }
        $statement = "UPDATE `Rezervace` SET `But_stat` = '0', `INT_Stav` = '0', `Autor` = '', `Pracoviste` = '---', `Clanek` = '', `Obsah` = '', `USER` = '', `id_mezistav` = 0, `ID_Sub` = 0, `id_mezistav` = 0 WHERE `Rezervace`.`ID_But` = ".$_GET['id'].";";
    $pdo->query("UPDATE `hodnoti` SET `done` = '1' WHERE `hodnoti`.`ID_clanek` = ".$_GET['id'].";");

        } else if($_GET['tb']=="tema") {
                $pdo->query("DELETE FROM komentar WHERE komentar_tema_id=".$_GET['id'].";");
            $statement = "DELETE FROM ".$_GET['tb']." WHERE ".$_GET['idcol']." = ".$_GET['id']." ;";
    } else {
                    $statement = "DELETE FROM ".$_GET['tb']." WHERE ".$_GET['idcol']." = ".$_GET['id']." ;";

    }

            $pdo->query($statement);
}




header('Location: admin.php?tb='.$_GET[tb]);
 die;
?>