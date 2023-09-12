        <?php
     session_start();
     require("db_connect.php");

       if($_SESSION["Opravneni"] < 6){
header('Location: Index.php');
}
     if(isset($_POST[login])) {
 $sql = "UPDATE `login_redaktor` SET `ID_Opr` = ? WHERE `login_redaktor`.`login` = ? ;";
$stmt= $pdo->prepare($sql);
$stmt->bindValue(1, $_POST[opravneni], PDO::PARAM_INT);
$stmt->bindValue(2, $_POST[login], PDO::PARAM_STR);
$stmt->execute();



 header('Location: Prehled.php');
     }
     if(!isset($_GET[login])) {
     header('Location: Prehled.php');
     }
?>


<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <style>
            
            h4{
                text-align:left;
                padding-left:1%;
            }
            
            .form_tvorba{
                box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
                border-radius:15px; 
                padding:20px;
                width:20%;
                text-align: left;
                
            }
            input {
                margin: 3px;
            }
            
            h1{color:#323232;}
        </style>
        <title>Změnit oprávnění</title>
    </head>
    
    <body>
<?php
    require("header.php");
       
      ?>
        
        <br /> <br />
    <center>
        
        <div class="form"> 
            <form method="post" action="ChangeUser.php" class="form_tvorba" style="background-color:#FFFAF0;" >
                <h2>Změnit oprávnění</h1>
                <?php    
                echo "<h4> Uživatel: ".$_GET[login]."</h4>";
                 echo "<input type='radio' id='r1' name='opravneni' value='1'";
                if($_GET[priv]==1) echo " checked";
                       echo "><label for='r1'>Čtenář</label><br>";
                 echo "<input type='radio' id='r2' name='opravneni' value='2'";
                if($_GET[priv]==2) echo " checked";
                       echo "><label for='r2'>Autor</label><br>";
                 echo "<input type='radio' id='r3' name='opravneni' value='3'";
                if($_GET[priv]==3) echo " checked";
                      echo "><label for='r3'>Recenzent</label><br>";
                 echo "<input type='radio' id='r4' name='opravneni' value='4'";
                if($_GET[priv]==4) echo " checked";
                      echo "><label for='r4'>Redaktor</label><br>";
                 echo "<input type='radio' id='r5' name='opravneni' value='5'";
                if($_GET[priv]==5) echo " checked";
                      echo "><label for='r5'>Šéfredaktor</label><br>";
                 echo "<input type='radio' id='r6' name='opravneni' value='6'";
                 if($_GET[priv]==6) echo " checked";
                       echo "><label for='r6'>Admin</label><br>";
                 echo "<input type='radio' id='r7' name='opravneni' value='7'";
                 if($_GET[priv]==7) echo " checked";
                        echo "><label for='r7'>Údržba</label><br>";
                        
                        echo '<input type="hidden" name="login" value="'.$_GET[login].'">';
                ?>
                    
                    
                    
                    <button type="submit" class="btn btn-secondary btn-lg active"> OK </button>
                    </div><br> </form>
                    
                    <br><br><br>
                    
                    
                    
                    
<?php
require 'footer2.php';
?>
                    
                    
                    </body>
                    </html>
                    
                    <!--
                    <div class="container">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Informace</h6>
                    <p>Text</p>
                    </div>
                    
                    <div class="footer_second">
                    <h6 class="text-uppercase font-weight-bold">Fotky</h6>
                    <p>Text</p>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Kontakt</h6>
                    <p>Jihlava
                    <br>Studenti
                    <br><a href="" class="">YouTube</a>
                    </p>
                    </div>
                    
                    </div>
                    </div>
                    
                    -->
