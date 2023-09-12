<?php
 require("connect.php");
 session_start();  
 
                       

  if($_SESSION["Opravneni"] < 1){
 
header('Location: Index.php');
exit;
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
#pokus{
  text-align:left:50%;
}
 .datum_style{
 text-align:right;
 color:red;
 }
  h4{
text-align:left;
padding-left:1%;
}
.redakce_pozadi{
    padding: 1%;
    margin: 2%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    text-align:center;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    color:black;
    text-align: center;
    display: grid;
    height: 80%;
    max-height: 80%;
    width: 95%;
    max-width: 95%;
    overflow: auto;    
}
/* width */
.redakce_pozadi::-webkit-scrollbar {
  width: 20px;
}

/* Track */
.redakce_pozadi::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #555555; 
  border-radius: 10px;
}
 
/* Handle */
.redakce_pozadi::-webkit-scrollbar-thumb {
  background: #DB2C23; 
  border-radius: 10px;
}

/* Handle on hover */
.redakce_pozadi::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}

input:hover + label img,
input:checked + label img{
border-radius: 50%;
box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
opacity: 0.5;
transition: .5s ease;
animation-fill-mode: forwards; 
}
.hid{
display:none;
}
.obryz{
position:relative;
top: 25%;
}
td {
  text-align: center;
  vertical-align: middle;
}
a {
  color: black;
}
.janevimž:hover {
  color: silver;
  transition: .5s ease;
  animation-fill-mode: forwards;
}

.prohlidka_vypis{
    padding: 8%;
    margin: 1%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    width:80%;
    text-align:left;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    display: inline-block;
    min-width: 470px;
}

.box {
  width: 20%;
  float: left;
  background: #DB2C23;
  margin: 12;
  height: 20%;
  width: 15%;
  border-radius:15px;
  min-width: 200px;
}
#mezzzzzzzzi{
  width: 250px;
}

</style>
<title>Prohlídka</title>
</head>

<body>
<img style="width:100%;" src="DeeThane.jpg">
<?php
 require 'header.php';
?><br><br><br><br><br><br><br>
 <center>
 <h1>
  Koho chcete kontaktovat?
 </h1>
<div class='prohlidka_vypis'><h3>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=1" class="btn btn-danger" id="mezzzzzzzzi"><h1>Čtenář</h1></a></div><div class="col-sm-8">  Uživatel procházející si naše příspěvky       </div></div><br><br>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=2" class="btn btn-danger" id="mezzzzzzzzi"><h1>Autor</h1></a></div><div class="col-sm-8">  Uživatel publikující v našem časopise       </div></div><br><br>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=3" class="btn btn-danger" id="mezzzzzzzzi"><h1>Recenzent</h1></a></div><div class="col-sm-8">  Uživatel, který dohlíží na nově přidávané články    </div></div><br><br>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=4" class="btn btn-danger" id="mezzzzzzzzi"><h1>Redaktor</h1></a></div><div class="col-sm-8"> Uživatel schvalující nově přidávané články    </div></div><br><br>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=5" class="btn btn-danger" id="mezzzzzzzzi"><h1>Šéfredaktor</h1></a></div><div class="col-sm-8">  Uživatel zodpovídající za práci Redaktorů, recenzentů a autorů  </div></div><br><br>
 <div class="row"><div class="col-sm-4"><a href="kontakt_formular.php?uziv=6" class="btn btn-danger" id="mezzzzzzzzi"><h1>Admin</h1></a></div><div class="col-sm-8"> Hlavní správce našich stránek        </div></div><br><br>
</h3></div>
 </center>
 <br><br><br><br><br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>
