<?php

	require_once('dbconnection.php');

	var_dump($_POST);
	$lot_id = $_POST["id"]; 

	//$sql = "SELECT * FROM ParkingLot WHERE Area = '$area'";
	$sql = "UPDATE ParkingLot SET Open = '0' WHERE ID = '$lot_id'";

	$result = mysql_query($sql, $connection) or die("Could not execute query '$sql' :" . mysql_error()."<br>\n");
?>