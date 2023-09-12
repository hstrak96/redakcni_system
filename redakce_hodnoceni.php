<?php
 require("db_connect.php");
  require("connect.php");
 session_start();  
 
                       

  if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
 }
 
      if(isset($_POST[date])) {
          if($_POST[r1]==$_POST[r2]) {
              $error="Nastavte různé recenzenty";
          } else {
              $sql74656=("DELETE FROM `hodnoti` WHERE `hodnoti`.`ID_clanek` = ?;");
              $stmt3= $pdo->prepare($sql74656);
              $stmt3->bindValue(1, $_POST[id], PDO::PARAM_INT);

              $stmt3->execute();
              $sql74656=("DELETE FROM `hodnoti` WHERE `hodnoti`.`ID_clanek` = ?;");
              $stmt3= $pdo->prepare($sql74656);
              $stmt3->bindValue(1, $_POST[id], PDO::PARAM_INT);
              $stmt3->execute();
              
 $sql1 = "INSERT INTO `hodnoti` (`ID_clanek`, `recenzent1`, `pozn`, `datum`) VALUES (?, ?, ?, ?);";
$stmt= $pdo->prepare($sql1);
$stmt->bindValue(1, $_POST[id], PDO::PARAM_INT);
$stmt->bindValue(2, $_POST[r1], PDO::PARAM_STR);
$stmt->bindValue(3, $_POST[pozn], PDO::PARAM_STR);
$stmt->bindValue(4, $_POST[date], PDO::PARAM_STR);
$stmt->execute();
/*
echo $_POST[id];
echo $_POST[r1];
echo $_POST[pozn];
echo $_POST[date];
*/
 $sql2 = "INSERT INTO `hodnoti` (`ID_clanek`, `recenzent1`, `pozn`, `datum`) VALUES (?, ?, ?, ?);";
$stmt1= $pdo->prepare($sql2);
$stmt1->bindValue(1, $_POST[id], PDO::PARAM_INT);
$stmt1->bindValue(2, $_POST[r2], PDO::PARAM_STR);
$stmt1->bindValue(3, $_POST[pozn], PDO::PARAM_STR);
$stmt1->bindValue(4, $_POST[date], PDO::PARAM_STR);
$stmt1->execute();


$sql3 = "UPDATE `Rezervace` SET `id_mezistav` = '1' WHERE `Rezervace`.`ID_But` = ?;";
$stmt2= $pdo->prepare($sql3);
$stmt2->bindValue(1, $_POST[id], PDO::PARAM_INT);
$stmt2->execute();
header('Location: kontakt_new.php');
          }
      }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/main.css">

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #696969;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #454545;
}

.con {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:80%;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

body {
 
  background: #e5e5e5;
  font: 13px/1.4 Geneva, 'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
}
label {
  display: block;
}
input {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
   padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
 
}
</style>
<title>Zaúkolování redaktorů</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>
  <center>
<h1>Zaúkolování recenzentů</h1>

<div class="con">
  <form action="redakce_hodnoceni.php" method="POST">
      <?php
   echo '<input type="hidden" name="id" value="'.$_POST[id].'">';
   //   echo '<input type="hidden" name="id" value="4">';
      ?>
    <div class="row">
      <div class="col-25">
     <label for="date">Datum spracování</label></div>  
       <input type="date" name="date" required>
      
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Příjemce</label>
      </div>
      <div class="col-75">
      
      <select id ="Pro" name="r1">
     <?php       
     $my_string3 ="3";

    $sql = "SELECT login FROM login_redaktor WHERE ID_Opr = '$my_string3'";
    $vysledek = mysqli_query($spojeni, $sql);
    $i=0;
    while ($radek = mysqli_fetch_assoc($vysledek)):
    echo "<option value='".$radek["login"]."'>".$radek["login"]. "</option>";
    endwhile;


?>      
</select>
      <select id ="Pro" name="r2">
      
     <?php      
     $my_string3 ="3";

    $sql = "SELECT login FROM login_redaktor WHERE ID_Opr = '$my_string3'";
    $vysledek = mysqli_query($spojeni, $sql);
    $i=0;
    while ($radek = mysqli_fetch_assoc($vysledek)):
    echo "<option value='".$radek["login"]."'>".$radek["login"]. "</option>";
    endwhile;


?>      
</select>



      </div> 
    </div>
    <div class="row">
      <div class="col-25">

        <label for="subject">Poznámka</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="pozn" placeholder="Zde napište vaší poznámku..." style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
    <br />
      <input type="submit" style="margin-left: 2%" value="Odeslat">
                           <?php
          echo ("<b style='color: red; position: relative; left: 30px; top:10px;'>$error</b>");
          ?>
    </div>

     <br />

    <i style="color: #A9A9A9; float:left;"><b style="color:red;">!</b> Určete dva recenzenty a stanovte jim datum na splnění recenze.</i>
  </form>
</div>
 </center>


<?php
 require 'footer2.php';
?>
</body>
</html>;
