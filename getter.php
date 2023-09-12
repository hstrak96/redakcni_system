<?php
session_start();

	$username = "lupinci";
	$password = "Lup1nc12020*";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
	$selected = mysql_select_db("lupinci", $dbhandle) or die("Could not select examples");
	$Kategorie = mysql_real_escape_string($_REQUEST["Kategorie"]);
	$query = "SELECT login FROM login_redaktor WHERE ID_Opr='$Kategorie'";
	
	$result = mysql_query($query);
		
	while ($row = mysql_fetch_array($result)) {
   		echo "<option>" . $row{'login'} . "</option>";
	}

?>