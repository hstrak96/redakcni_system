<?php
 require("connect.php");
?>


<style>  

.form
{
align-items: center;
background-image: url(form.png);
background-repeat: no-repeat;
background-position: center;
height: 80%;
text-align: center;


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

}

.rating input:hover + label,
.rating input:checked + label
{
filter: grayscale(0);
opacity:1;
width:160px;   

}

.rating label h4
{
color: #fff;
font-size:24px;
padding-top:10px;
font-weight:500;
white-space:nowrap;
opacity:0;
transform:translateY(-50px) scale(0);
transition: 0.5s;

}

.rating input:hover + label h4,
.rating input:checked + label h4
{
opacity:1;
color: #fff;
transform:translate(0) scale(1);

}

.text{
  position:absolute;
  top:-80px;
  left:50%;
  transform:translateX(-50%);
  color: #fff;
  width:500px;
  font-weight:700;
  letter-spacing: 2px;
  text-align:center;
  white-space:nowrap;
  font-size: 36px;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
 <HTML>                           
 <HEAD>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="generator" content="PSPad editor, www.pspad.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/main.css">
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>
 <link href="bootstrap/css/bootstrap.css" media="all" type="text/css" rel="stylesheet">
  <link href="styly.css" media="all" type="text/css" rel="stylesheet">    
    <link href="main.css" media="all" type="text/css" rel="stylesheet">  
    <title>Registrace</title>
 </HEAD>
 <BODY>  
 <?php
  require 'header.php';
 ?>
<FORM ACTION="pridat.php" METHOD=GET>
<div class="form">
<br><br><br><br><br><br><br><br><br>
    <h5>Login:&nbsp;&nbsp;<input type="text" name="user" /></h5> <br>
    <h5>Heslo:&nbsp;&nbsp;<input type="password" name="passwd" /></h5> <br>
    <h5>Email:&nbsp;&nbsp;<input type="text" name="email" /></h5> <br>
    <input type="hidden" id="icon" name="icon" value="1" />
<div class="rating">
<input type="radio" name="star" value="1" id="star1">
      <label for="star1">
      <img class="obrazz" id="1" src="dogo.png">
      <h4>Dogo!</h4></label>
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
</div><br>



<button type="submit" class="btn btn-outline-light" value="Login" /> Registrace </button>

 </div></form>
 </BODY>
 
 
                                                                                                               <br>



 
 
 <?php
  require 'footer.php';
 ?>
 </HTML>






