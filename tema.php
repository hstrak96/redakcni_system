<?php
session_start();
require("db_connect.php");
$aktualni_id =(int) $_GET['id'];
if ($_POST)
{
    if (empty($_POST['komentar_text']))
    {

    } else {
$sql2='INSERT INTO komentar (komentar_login, komentar_tema_id, komentar_text) VALUES (?,?,?);';

$pdo->prepare($sql2)->execute([$_SESSION["Username"], $aktualni_id, $_POST['komentar_text']]);
   
    }
}
?>
<html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main2.css">
        <style>
            
        </style>	
        <title>Fórum - téma</title>
    </head>
    
    <body>                                     
<?php
 require 'header.php';
?><br><br><br>
    <center>
        
        
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
        <center>
            
            <div class='forum'>
                
                <br>
                
                <table >
                    
                    
                          <?php

$sql = "SELECT tema_vznik, tema_nadpis, tema_text, tema_login, icon from tema join login_redaktor on tema_login=login_redaktor.login where tema.tema_id = '". $aktualni_id ."';";
$vysledek = $pdo->query($sql);
if (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE) {
    echo("<tr class='barvatabulky bila'><td  colspan='2'>$radek[tema_nadpis]</td></tr>");
     echo("<tr><td><p class='stred'>$radek[tema_login]<br />");
     switch ($radek[icon]) {
         case 1:
echo'<img src="dogo.png" />';
             break;
         case 2:
echo'<img src="roh.png" />';
             break;
      case 3:
echo'<img src="lebkov.png" />';
             break;
     }
     
     echo("</p></td><td class='tablesirka'><p class='stred'>$radek[tema_text]</p> <p class=\"odpovedet\"> $radek[tema_vznik]&nbsp;&nbsp;&nbsp;</p></td></tr>");
     

echo '<tr class="barvatabulky bila" >  <td  class="bila"  colspan="2">Odpovědi</td></tr> ';

$sql = "SELECT datum, komentar_text, komentar_login, icon FROM komentar JOIN login_redaktor ON komentar_login=login_redaktor.login JOIN tema ON komentar.komentar_tema_id=tema.tema_id where tema.tema_id = '".$aktualni_id."' order by datum;";
$vysledek2 = $pdo->query($sql);
while (($radek2 = $vysledek2->fetch(PDO::FETCH_BOTH)) != FALSE):
echo("<tr><td><p class='stred'>$radek2[komentar_login]<br />");
     switch ($radek2[icon]) {
         case 1:
echo'<img src="dogo.png" />';
             break;
         case 2:
echo'<img src="roh.png" />';
             break;
      case 3:
echo'<img src="lebkov.png" />';
             break;
     }
        echo("</p> </td><td class='tablesirka'><p class='stred'>$radek2[komentar_text]</p> <p class='odpovedet'> $radek2[datum]&nbsp;&nbsp;&nbsp;</p></td></tr>");
endwhile;
} else {
    echo "Toto téma neexistuje";
}
?>
                </table>
            
            <?php
               echo ("<form method=\"post\" action=\"tema.php?id=$aktualni_id\">");
               echo $_SESSION["Username"];
               ?>
                
                <div class="form"> 

    <textarea style="resize: auto; width:95%; margin-top: 10px; min-width: 350px; min-height:200px;" placeholder="Komentář" class="obsah" id="exampleFormControlTextarea1" name="komentar_text"></textarea><hr> 
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit"> Přidat komentář </button>
  </div><br /> </form>
            </div>
<?php
 require 'footer.php';
?>        
            </body>
            </html>
