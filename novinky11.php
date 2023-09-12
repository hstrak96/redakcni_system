     <?php
session_start();                          

  if($_SESSION["Opravneni"] < 4){
 
header('Location: Index.php');
exit;
 }



class Db
{
    private static $connection;

    private static $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($host, $database, $user, $password)
    {
        if (!isset(self::$connection)) {
            $dsn = "mysql:host=$host;dbname=$database";
            self::$connection = new PDO($dsn, $user, $password, self::$options);
        }
    }

    private static function executeStatement($params)
    {
        $query = array_shift($params);
        $statement = self::$connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public static function query($query) {
        $statement = self::executeStatement(func_get_args());
        return $statement->rowCount();
    }
}

Db::connect('localhost', 'lupinci', 'lupinci', 'Lup1nc12020*');

$novinky = array(
    'novinky_id' => '',
    'titulek' => '',
    'obsah' => '',
    'datum' => '',
);

if ($_POST)
{
    if (empty($_POST["titulek"]) || empty($_POST["obsah"]))
    {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Něco není vyplněno"); }
        </script>';
    } else {
        Db::query('
            INSERT INTO novinky (titulek, obsah)
            VALUES (?, ?)
        ', $_POST['titulek'], $_POST['obsah']);

        Db::query('
            INSERT INTO historie (Login, Uprava)
            VALUES (?, ?)
        ', $_SESSION["Username"], $_POST['obsah']);


        //PŘEPSAT

        //header('Location: novinky11.php');
        header('Location: Index.php');   
        exit();        
    }
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
 min-width:300px;
 }
 .nvm{
 box-shadow: 2px 2px 5px #696969, -2px -2px 5px #696969;
 border-radius:15px; 
 padding:2px;
 width:20%;
 }
 .obsah{
   width:95%;
 
}
.titulek{
width:95%;
}
#nadpis{
width:98%;
}


h1{color:#323232;}
</style>
<title>Vložení novinky</title>
</head>

<body>
<?php
 require 'header.php';
?><br><br><br>


 <center>
<form method="post" class="form_tvorba">
<div class="form" > 

    
  <h3 id="nadpis">Tvorba novinek</h3> 
     <h6 class="tyt">Název:</h6>
           </td><td>
      <input class="titulek" type="text" name="titulek" value="<?= htmlspecialchars($novinky['titulek']) ?>" /> <hr>
    <h6 class="tyt">Obsah:</h6>
          </td><td>
      <textarea  class="obsah" name="obsah"><?= htmlspecialchars($novinky['obsah']) ?></textarea><hr> 
    <button type="submit" class="btn btn-secondary btn-lg active" value="Uložit" /> Přidat </button>
  </div>
    <br> 
  </form>
  
<br><br><br>
<?php
 require 'footer2.php';
?>
</body>
</html>


