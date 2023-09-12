<?php
  require("db_connect.php");
  session_start();
                       
  if($_SESSION["Opravneni"] < 6){
    header('Location: Index.php');
    exit;
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
  
    <style>
   
    </style>	
  <title>Navrh na menu</title>
  </head>
  
  <body>                                     
    <?php
     require 'header.php';
    ?><br><br><br>
    <center>

    &nbsp;<br>
    &nbsp;<br>
    &nbsp;<br>

      <div class='forum'>
        <br>
        <h4>Administrace webu</h4>
        <table >
          <tr class="barvatabulky bila"   ><td><a class="navbar-brand" href="admin2.php?tb=tema">Fórum</a></td>
            <td><a class="navbar-brand" href="admin2.php?tb=komentar">Komentář</a></td>
            <td><a class="navbar-brand" href="admin2.php?tb=novinky">Novinky</a></td>
            <td><a class="navbar-brand" href="admin2.php?tb=Rezervace">Rezervace</a></td>
            <td><a class="navbar-brand" href="admin2.php?tb=hodnoceni">Hodnocení</a></td>
          </tr>
        </table><br>
        <table style="margin: auto;position: relative;width: 100%">  
          <tr class="barvatabulky bila">       
          <?php
            if($_GET[tb]==null){
              $_GET[tb]="tema";                 //přidal honza když aby byl vidět footer
            }
                              
            $sql = ("SELECT * FROM ".$_GET[tb]);
            $vysledek = $pdo->query($sql);
            //echo $sql;
            $radek = $vysledek->fetch();
            $col = array_keys($radek);
            //print_r(array_keys($radek));
            $i=0;
            //echo ("<tr>");

            if ($_GET[tb]=="novinky") {
              echo ("<td>ID</td><td>Titulek</td><td>Obsah</td><td>Datum vzniku</td><td>Smazat</td><td>Upravit</td>");
            }
            if ($_GET[tb]=="tema") {
              echo ("<td>ID</td><td>Název</td><td>Text</td><td>Datum vzniku</td><td>Vytvořil</td><td>Smazat</td>");
            }
            if ($_GET[tb]=="komentar") {
              echo ("<td>ID</td><td>Napsal</td><td>Téma ID</td><td>Text</td><td>Datum vytvoření</td><td>Smazat</td>");
            }
            if ($_GET[tb]=="Rezervace") {

         
         echo ("<td>ID</td><td>But_stat</td><td>Stav</td><td>Autor</td><td>Pracoviště</td><td>Článek</td><td>Obsah</td><td>ID_Sub</td><td>Uživatel</td><td>Smazat</td>");

            }
            if ($_GET[tb]=="hodnoceni") {
         
         echo ("<td>ID</td><td>Kontrol</td><td>Autor</td><td>Obsah</td><td>Hodocení</td><td>Hodnocení 1</td><td>Hodnocení 2</td><td>Hodnocení 3</td><td>Hodnocení 4</td><td>Poznámka</td><td>Login</td><td>Smazat</td>");

            }
            echo ("</tr>");

            do {
              $i=0;
              echo ("<tr>");
              while(!empty($col[$i])) {
                $index=$col[$i];
                echo ("<td>$radek[$index]</td>");
                $i+=2;
              }

              switch ($_GET[tb]) {
                case "tema":
                echo ("<td><a href='admin_delete2.php?idcol=tema_id&tb=$_GET[tb]&id=$radek[tema_id]'>Smazat</a></td></tr>");
                break;
              case "komentar":
                echo ("<td><a href='admin_delete2.php?idcol=komentar_id&tb=$_GET[tb]&id=$radek[komentar_id]'>Smazat</a></td></tr>");
                break;
              case "novinky":
                echo ("<td><a href='admin_delete2.php?idcol=novinky_id&tb=$_GET[tb]&id=$radek[novinky_id]'>Smazat</a></td><td>"
                      . '<br><form name="myLetters" action="pokus.php" method="POST"><button type="submit" id="pokus" class="btn btn-outline-danger" name="btn" value="' . $radek['novinky_id'] . '">Upravit</button></form>'
                      . "</td></tr>");
                break;          
              case "Rezervace":
                echo ("<td><a href='admin_delete2.php?idcol=ID_But&tb=$_GET[tb]&id=$radek[ID_But]'>Smazat</a></td></tr>");
                break;
              case "hodnoceni":
                echo ("<td><a href='admin_delete2.php?idcol=ID&tb=$_GET[tb]&id=$radek[ID]'>Smazat</a></td></tr>");
                break;
              }
            } while (($radek = $vysledek->fetch(PDO::FETCH_BOTH)) != FALSE);
          ?>
        </table>
      </div>
    </center>

    <footer class="page-footer" style="display: block; position: relative; bottom: 0;  background-color: #555555; width:100%;">

      <div class="container">
        <div class="row">
          <div class="footer_second">
            <h6>Developeři</h6>
            <p>Produck Owner: korbel05(Jenýk Korbel)</p>
            <p>Scrum master: blazej04(Michal Blažejovský)</p>
            <p>Member: servit01(Petr Servít)</p>
          </div>
          <div class="footer_second">
            <h6>Developeři</h6>
            <p>Member: straka07(Jan Straka)</p>
            <p>Member: prihod12(Tadeáš Příhoda)</p>
            <p>Member: kovali01(Jan Kovalík)</p>
          </div>

          <div class="footer_second">
          <h6></h6>
          </div>
        </div>
      </div>
      <div class="footer_lupinci">2020/2021 : tým Lupínci</div>
      <div class="footer_odkaz">Odkaz na  <a><b>VSPJ</b></a></div>
    </footer>   
  </body>
</html>
