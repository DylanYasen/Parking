<?php
	include_once ('DatabaseConnection.php');

	$dbConnection = new DatabaseConnection(False);

	// getting IT Parking Lot data
	// * Don't have to mark database *field*
	// * Mark the *var* to compare with
	echo "<div class = 'infoBoxParent'>";

	// ========================= IT Parking Lot ========================= //
	$area = "IT Parking Lot";
	$sql = "SELECT * FROM ParkingLot WHERE Area = '$area'";
	$result = $dbConnection->executeQuery($sql);
	OutputInfoBox($area,$result);
	// ========================= END ========================= //

	// ========================= Commons Garage ========================= //
	$area = "Commons Garage";
	$sql = "SELECT * FROM ParkingLot WHERE Area = '$area'";
	$result = $dbConnection->executeQuery($sql);
	OutputInfoBox($area,$result);
	// ========================= END ========================= //

	// ========================= Admission Building ========================= //
	$area = "Admission Building";
	$sql = "SELECT * FROM ParkingLot WHERE Area = '$area'";
	$result = $dbConnection->executeQuery($sql);
	OutputInfoBox($area,$result);
	// ========================= END ========================= //

	echo "</div>";
	
	function OutputInfoBox($area,$parkingInfo){

		echo "<div class = 'parkingInfoBox'>";
		echo "<h1>$area</h1>";
		echo "<hr>";	
		
		while ($row = mysql_fetch_row($parkingInfo)) {
	    	$num = $row[1];
	    	$permission = $row[2];
	    	$isOpen = $row[3];
	    	$id = $row[4];

	    	echo "<h4 id = '$id'>";
	    	echo"<span class = 'parkNum' id = 'parkNum'>Number: $num </span>";
	    	echo"<span class = 'parkPerm' id = 'parkPerm'>Permission: $permission </span>";
	    	
	    	echo "<span class = 'parkStatus' id = 'parkStatus'>";
	    	if ($isOpen){
	    		echo "<span class = 'parkOpen' id = 'parkStatus'>Avaliable</span>";
	    		echo "<Button>Reserve</Button>";	
	    	} 
	    	else
	    		echo "<span class = 'parkClosed' id = 'parkStatus'>Occupied</span>";

			echo "</h4>";
		}
		echo"</div>";
	}
?>