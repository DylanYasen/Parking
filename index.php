<!DOCTYPE html>
<html>
<head>
	<title>Parking</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

</head>
<body>

<?php
	//include_once ('php/DatabaseConnection.php');
	//$dbConnection = new DatabaseConnection(False);
	include_once ('php/GenerateParkingInfoUI.php');
?>

<script>
	$(function() {
		$('button').click(function(event) {
			/* Act on the event */
			$(this).hide('slow/400/fast', function() {

				// UI
				$parkHeader = $(this).parent();
				console.log($parkHeader);
				$parkHeaderID = $parkHeader.attr('id');
				console.log($parkHeaderID);
				$statusSpan = $parkHeader.find('#parkStatus'); 
				$statusSpan.text('Occupied');
				$statusSpan.removeClass('parkOpen').addClass('parkClosed');

				// Update backend
				$.ajax({
					url: 'php/UpdateParkInfoDB.php',
					type: 'POST',
					data: {id: $parkHeaderID},

				})
				.done(function(XMLHttpRequest) {
					console.log("success");
					console.log(XMLHttpRequest);	
				})
				.fail(function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(errorThrown);
					console.log(textStatus);
					console.log(XMLHttpRequest);
				});
			});
		});
	});
	
</script>

</body>
</html>