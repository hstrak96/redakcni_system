<?php
 session_start();
require("connect.php");
?> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .extra {
        margin: 5px;
    }
</style>     
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="Index.php"><img src="logo.PNG" width="80" height="50"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">       
                <div class="dropdown" style="float:left;">
                    <button class="dropbtn"><b>Menu</b></button>
                    <div class="dropdown-content" style="left:0;">
                        
                        
                        <a class="navbar-brand fon" href="info.php"><b>Základní informace</b></a>
                        <a class="navbar-brand fon" href="video.php"><b>Video návod</b></a>
                        <a class="navbar-brand fon" href="Prohlidka.php"><b>Prohlidka</b></a> 
<?php
 if($_SESSION["user_is_logged"] == 1){ 
 echo('
<a class="navbar-brand fon" href="Kontakt_cislo.php"><b>Kontakt</b></a>
<a class="navbar-brand fon" href="Forum.php"><b>Fórum</b></a>

');
    $sql22 = "SELECT * FROM kontakt WHERE ID_zobrazeno=1 AND Pro='$_SESSION[Username]'";
    $vysledek22 = mysqli_query($spojeni, $sql22);
    $radek22 = mysqli_fetch_assoc($vysledek22);
    
    if ($vysledek22->num_rows == 0) {
    $_SESSION["Zobrazeno"] = 0; 
    }else{ 
    $_SESSION["Zobrazeno"] = $radek22['ID_zobrazeno'];    
    }
    //$sql33 = "SELECT * FROM Rezervace WHERE INT_Stav=1";
    if($_SESSION[Opravneni]==3) {
        $sql33 = ("SELECT * FROM hodnoti where recenzent1='$_SESSION[Username]' and done='0';");
    }
    if($_SESSION[Opravneni]==4||$_SESSION[Opravneni]==5) {
        $sql33 = "SELECT * FROM `Rezervace` WHERE id_mezistav='0' AND clanek<>''";
    }
    $vysledek33 = mysqli_query($spojeni, $sql33);
    $radek33 = mysqli_fetch_assoc($vysledek33);     

    if ($vysledek33->num_rows == 0) {
    $_SESSION["Zadano"] = 0; 
    }else{ 
    $_SESSION["Zadano"] = 1;   
    }
 }

        
    

 
 if($_SESSION["Opravneni"] >= 4){
 
 echo('       

<a class="navbar-brand fon" href="novinky11.php"><b>Přidat Novinky</b></a>


');
 }
 if($_SESSION["Opravneni"] >= 6){
 
 echo('
<a class="navbar-brand fon" href="admin.php"><b>Admin panel</b></a> 
<a class="navbar-brand fon" href="Prehled.php"><b>Přehled uživatelů</b></a> 
');
 }
 if($_SESSION["Opravneni"] >= 2){
 
 echo('
<a class="navbar-brand fon" href="prehled_clanek.php"><b>Přehled mých článků</b></a>
<a class="navbar-brand fon" href="trouble_vypis.php"><b>Trouble</b></a> 
<a class="navbar-brand fon" href="Redakce.php"><b>Rezervace</b></a>
');
 }

if($_SESSION["Opravneni"] >= 3){
 
 echo('
<a class="navbar-brand fon" href="hodnoceni_tabulka.php"><b>Hodnotit články</b></a> 
');
 }
 
 if($_SESSION["Opravneni"] >= 4){
 
 echo('
<a class="navbar-brand fon" href="historie.php"><b>Historie úprav</b></a>
');
 }
?>
                    </div> </div>
                <!-- Zde se přidávají další odkazy-->
            </li>
        </ul>
        
   <!--     <form class="form-inline my-2 my-lg-0">
            
       
            </button>
       -->     
            <div  id="main-navigation">
                
                <ul class="navbar-nav">
                    
<?php


/*echo('<li class="nav-item ber"><a class="nav-link" href="" style="color: #FDF5E6;"><b>'.$_SESSION["Username"].'</b></a>');*/
/* ---  ÚPRAVA ÚČTU  ---  */

 
                                       
?>
                    
                    
                    
                    
                    <li class="nav-item">
 <?php

 if($_SESSION["user_is_logged"]==1){

if(($_SESSION["Zobrazeno"] == 1) || ( $_SESSION["Zadano"] == 1))
echo('<div class="extra"><a href="kontakt_new.php"><img src="let-mes2.png" height="35px"></a></div>');
else{
echo('<div class="extra"><a href="kontakt_new.php"><img src="let-mes.png" height="35px"></a></div>');
}
echo('
<li class="nav-item ber"><a class="nav-link" href="ucet2.php" style="color: #FDF5E6;"><b>'.$_SESSION["Username"].'</b></a>');

 switch ($_SESSION["Icon"]) {
 	case 1: echo('<li class="nav-item"><img src="dogo.png" height="50px">');break;
    case 2: echo('<li class="nav-item"><img src="roh.png" height="50px">');break;
    case 3: echo('<li class="nav-item"><img src="lebkov.png" height="50px">');break;
 }  
 
echo('<li class="nav-item ber"><a class="nav-link" href="logout.php" style="color: #FDF5E6; "><b>Odhlásit se</b></a>'); 
 echo('<li class="nav-item">
<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
<input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
<button class="btn btn-light" type="submit" value="Search">Search</button>
</form>  
');
 }
 else
 echo('<a class="nav-link ber" href="registration.php" style="color: #FDF5E6;"><b>Registrace</b></a>
<li class="nav-item">
<li class="nav-item">
<a class="nav-link ber" href="login.php" style="color: #FDF5E6;"><b>Přihlášení</b></a>
<li class="nav-item">
<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
<input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
<button class="btn btn-light" type="submit">Search</button>
</form>') ; 
?>
                        
                        
                <!--</form>-->        
                       
                        </div>
                        </nav>
                        
                        
