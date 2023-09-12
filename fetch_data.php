<?php
  if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'lupinci';
 $pass = 'Lup1nc12020*';
 mysql_connect($host, $user, $pass);
 mysql_select_db('lupinci');

 $state = $_POST['get_option'];
 $find=mysql_query("SELECT login FROM login_redaktor WHERE ID_Opr = '$state'");

 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['login']."</option>";
 }
 exit;

}
?>