<?php 

require_once('dbconfig.php');

$connection = mysql_connect($server, $username, $password) or die("Could not connect to MySQL: ". mysql_error());

$tableSelected = mysql_select_db($dbName, $connection) or die("Could not select '$db' database". mysql_error());

function executeQuery($sql){
	$result = mysql_query($sql, $connection) or die("Could not execute query '$sql' :" . mysql_error()."<br>\n");

	return $result;
}
?>