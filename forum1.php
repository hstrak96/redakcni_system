     <?php
     session_start();
     require_once 'db_connect.php';

$tema = array(
    'tema_nadpis' => '',
    'tema_text' => '',
);

if ($_POST)
{
    if (empty($_POST["tema_nadpis"]) || empty($_POST["tema_text"]))
    {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Něco není vyplněno"); }
        </script>';
    } else {

$sql="INSERT INTO tema (tema_nadpis, tema_text, tema_login) VALUES (?,?,?);";
$pdo->prepare($sql)->execute([$_POST['tema_nadpis'], $_POST['tema_text'], $_SESSION["Username"]]);


        header("Location: Forum.php");   
        exit();        
    }
}
?>

     
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="main2.css">
<style>
 .datum_style{
 text-align:right;
 color:red;
 }
  h4{
text-align:left;
padding-left:1%;
}

.form_tvorba{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:20%;
}


h1{color:#323232;}
</style>
<title>Nové téma</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>


 <center>
     <form method="post" action="forum1.php" class="form_tvorba">
<div class="form"> 

    <h1>Nové téma</h1>
     <h6 class="tyt">Nadpis:</h6><input maxlength="50" class="titulek" type="text" name="tema_nadpis" value="<?= htmlspecialchars($tema['tema_nadpis']) ?>" /> <hr>
    <h6 class="tyt">Obsah:</h6><textarea  style="resize: auto;" class="obsah" id="exampleFormControlTextarea1" name="tema_text"><?= htmlspecialchars($tema['tema_text']) ?></textarea><hr> 
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Přidat článek </button>
  </div><br> </form>

<br><br><br>
<?php
 require 'footer2.php';
?>
</body>
</html>