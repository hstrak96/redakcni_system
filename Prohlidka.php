<?php
 require("connect.php");
 session_start();  
 
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
  color: white;
}
.janevimž:hover {
  color: silver;
  transition: .5s ease;
  animation-fill-mode: forwards;
}

.prohlidka_vypis{
    padding: 1%;
    margin: 1%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    width:80%;
    text-align:center;
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
  margin: 12px;
  height: 20%;
  width: 15%;
  border-radius:15px;
  min-width: 200px;
}

.box2{ width: 20%;
  float: left;
  margin: 12px;
  height: 5%;
  width: 15%;
  border-radius:15px;
  min-width: 200px;
  font-size:22.5px;
  padding: 5px;

}
 .text23{font-size:40px; text-shadow:1px 1px 4px #696969;  }
  
     
</style>
<title>Prohlídka</title>
</head>

<body>
<img style="width:100%;" src="DeeThane.jpg">
<?php
 require 'header.php';
?><br><br><br><br><br><br><br>
 <center>
 <h1 class="text23">
  Které číslo chcete procházet?
 </h1>
<div class='prohlidka_vypis'>                                 
 <a class="icon" href="Prohlidka_cislo.php?cislo=1"><div class="box">
 <img height="100%" class="image" src="1.png"><div class="overlay">
    <i class="fa fa-user"></i>
  </div></div></a>
  
  
            
 <a href="Prohlidka_cislo.php?cislo=2"><div class="box"><img height="100%" src="2.png">
              
 </div></a>  
 <a href="Prohlidka_cislo.php?cislo=3"><div class="box"><img height="100%" src="3.png">
 
 </div></a> 
 <a href="Prohlidka_cislo.php?cislo=4"><div class="box"><img height="100%" src="4.png">
 
 </div></a> 
 <a href="Prohlidka_cislo.php?cislo=5"><div class="box"><img height="100%" src="5.png">
 
 </div></a> 
 <a href="Prohlidka_cislo.php?cislo=6"><div class="box"><img height="100%" src="6.png">
 
 </div></a>
 
 
  <div class="box2">
 <div class="overlay">
<b> Leden - Únor<br />
 Téma: Technika</b>
    <i class="fa fa-user"></i>
  </div></div></a>
  
  
    
<div class="box2">
 <b>Březen - Duben <br />
 Téma: Zdravotnictví</b>
 </div>
<div class="box2">
  <b>Květen - Červen<br />
  Téma: Robotika</b>
 </div>
<div class="box2">
 <b> Červenec - Srpen<br />
 Téma: Politika</b>
 </div>
<div class="box2">
 <b>Září - Říjen<br />
 Téma: Příroda</b>
 </div>
<div class="box2">
 <b>Listopad - Prosinec<br />
 Téma: Auto - Moto</b>
 </div></a>
 
 
</div>
 </center>
 <br><br><br><br><br><br><br>  
<?php
 require 'footer.php';
?>
</body>
</html>
