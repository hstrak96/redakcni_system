<?php
 require("connect.php");
 require("db_connect.php");
 session_start();
 $sql = "select * from login_redaktor Where Username = '".$_SESSION["Username"]."'";

 $vysledek = mysqli_query($spojeni, $sql);
 $radek = mysqli_fetch_assoc($vysledek);
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
/*
input:hover + label img,
input:checked + label img{
border-radius: 50%;
box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
opacity: 0.5;
transition: .5s ease;
animation-fill-mode: forwards; 
}
*/
.hid{
display:none;
}
.obryz{
position:relative;
top: 25%;
}
.ucet{
    padding: 1%;
    margin: 2%;
    box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969; 
    text-align:center;
    display:block;
    border-radius:15px;
    background-color:#FFFAF0;
    color: black;
    height:92%;
}









}
.shake{
   border-radius: 50%;
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  animation: shake 0.9s;
  animation-iteration-count: infinite;
  box-shadow: 2px 7px 11px black; 


}
.obrazz:hover{  
   border-radius: 50%;
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  animation: shake 0.5s;
  animation-iteration-count: infinite;
  box-shadow: 2px 7px 11px black; 
/*  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)*/
}                

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

 @import url('https://fots.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
*
{
margin:0;
padding:0;
box-sizing: border-box;

}


.rating
{          
flex-direction: row-reverse;     
 


}
.rating input{
  display:none;
  
}

.rating label
{
 position:relative;
 width:0;
 height:128px;
 cursor:pointer;
 transition: 0.5s;
 filter:grayscale(1);
 text-align:center;
 opacity: 0;        
}  

.rating:hover label
{                    
width:150px;
opacity:0.2;   
text-align: center; /*-----------------------*/  

}

.rating input:hover + label,
.rating input:checked + label
{
filter: grayscale(0);
opacity:1;
width:160px;   
text-align: center; /*-----------------------*/  
}

.rating label h4
{
color: #fff;
color: black;
font-size:24px;
padding-top:10px;
font-weight:500;
white-space:nowrap;
opacity:0;
transform:translateY(-50px) scale(0);
transition: 0.5s;
text-align: center; /*-----------------------*/  
}

.rating input:hover + label h4,
.rating input:checked + label h4
{
opacity:1;
color: #fff;
color: black;
transform:translate(0) scale(1);
text-align: center; /*-----------------------*/  
}

.text{
  position:absolute;
  top:-80px;
  left:50%;
  transform:translateX(-50%);
  color: #fff;
  color: black;
  width:500px;
  font-weight:700;
  letter-spacing: 2px;
  text-align:center;
  white-space:nowrap;
  font-size: 36px;
}


.udaje{
  margin: auto;
  width: 60%;

}

.zmenit{
  font-size: 20px;
  padding: 4px 8px;
  margin-top: -2px;
  background-color: #DB2C23;
  width: 150px;
  color: white;
  float: right;
  margin-left: -80px;
  margin-right: 60px;
}

.zmenit2{
  font-size: 20px;
  padding: 4px 8px;
  margin-top: -2px;
  background-color: #DB2C23;
  width: 200px;
  color: white;
}
.form12{top:-4.5px; position:relative; }
.uporavanew{ box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2%;
  width:60%;
 min-width:1200px;
  background-color:#FFFAF0;}
 .text23{font-size:40px; text-shadow:1px 1px 4px #696969;  }
 .foto12{
position:relative;
 left:10%;
 top:40px;
 
 }
 .nevimnic{
 min-width:300px;
 
 }
</style>
<title>Navrh na menu</title>
</head>

<body>
<?php
 require 'header.php';
?>
<br><br><br>
<center>
 
     
            <div class="uporavanew">
        <?php
        echo('<h2 class="text23">Účet: '.$_SESSION["Username"].'</h2> ');                                       
        ?></b></h2>
      
        
              <?php
                switch ($_SESSION["Icon"]) {
               	  case 1: echo('<img src="dogo.png" height="150px" align="left" class="foto12">');break;
                  case 2: echo('<img src="roh.png" height="150px" align="left" class="foto12">');break;
                  case 3: echo('<img src="lebkov.png" height="150px" align="left" class="foto12">');break;}


                  echo('<div class="udaje">');
                  echo('<form action="update_ucet.php" method=GET><br><h3>Login: <input type="text" name="user" value="'.$_SESSION["Username"].'">&nbsp;<button type="submit"class="btn btn-danger form12" value="login" /> Změnit login</button></form> <br/>');
                  echo('<form action="update_email.php" method=GET><br><h3>E-mail: <input type="text" name="email" value="'.$_SESSION["email"].'">&nbsp;<button type="submit" class="btn btn-danger form12" value="e-mail" /> Změnit e-mail</button></form> <br/>');
                  echo('<form action="update_heslo.php" method=GET><br><h3>Heslo: <input type="password" name="passwd" placeholder="Zadejte nové heslo">&nbsp;<button type="submit" class="btn btn-danger form12" value="heslo" /> Změnit heslo</button></form> <br/><br/></div><br><br>');
              ?>
              <form action="update_logo.php" method="GET" class="nevimnic">
                <div class="rating">
                  <input type="radio" name="star" value="1" id="star1">
                    <label for="star1">
                      <img class="obrazz" id="1" src="dogo.png">
                      <h4>Dogo!</h4>
                    </label>
                  <input type="radio" name="star" value="2" id="star2" checked>
                    <label for="star2">
                      <img class="obrazz" id="2" src="roh.png">
                      <h4>Ryba s rohem</h4>
                    </label>
                  <input type="radio" name="star" value="3" id="star3">
                    <label for="star3">
                      <img class="obrazz" id="3" src="lebkov.png">
                      <h4>Lebka</h4>
                    </label>
                </div>
                <br><br>
                <button type="submit" class="btn btn-danger" value="heslo" />Změnit obrázek</button>
              </form>
              <br>
           </div>
</center>

<br><br><br>
<?php
 require 'footer.php';
?>
</body>
</html>