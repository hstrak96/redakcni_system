<?php
session_start();
$username = "lupinci";
$password = "Lup1nc12020*";
$pdo = new PDO("mysql:host=localhost; dbname=lupinci",$username,$password);

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
        <title>Hodnocení</title>
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
                
                
                
                <table class='tablesirka'>
 <tr class="barvatabulky bila" ><td>Typ</td><td>Vyjádření</td><td>Obsah</td></tr> 
                          <?php
$aktualni_id =(int) $_GET['id'];
$aktualni_id2 =(int) $_GET['id2'];
$sql = "SELECT * FROM hodnoceni WHERE kontrol=$aktualni_id";
$vysledek = $pdo->query($sql);

 while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE):
     echo ("<tr><td><p>Hodnocení</p></td><td><p>$radek[Poznamka]</p></td><td>$radek[Obsahh]</td></tr>");

endwhile;

$sql2 = "SELECT * FROM zamitnute WHERE ID=$aktualni_id2";
$vysledek2 = $pdo->query($sql2);
while (($radek = $vysledek2->fetch(PDO::FETCH_BOTH)) != FALSE):
$_SESSION["Prijemce"] = $radek["zamitnul"];
$_SESSION["Obsah_clanku"] = $radek["Obsah"];
     echo ("<tr><td><p>Hodnocení</p></td><td><p>$radek[Vyjadreni]</p></td><td name='clanek'>$radek[Obsah]</td></tr>");
    echo ("<a href='trouble.php'><button class='btn-danger left' name='btn' type='submit' value=". $radek['ID_But'] .">Vyjadrit se</button></a>");
endwhile;
?>
                </table>
                
            </div>
<?php
 require 'footer2.php';
?>        
            </body>
            </html>
