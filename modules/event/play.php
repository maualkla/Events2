<?php include("../system/sesion.php"); ?>
<?php
/* Play PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 23rd, 2019
	--> Last Edition: April 23rd, 2019
	--> Description: Page to view the events.
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Play Event</title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="" id="error-msg">
			<?php
			?>
		</div>
		<div class="container">
			
			<div class="top">
				<div class="top-title"><h2>Play Event</h2></div>
				<div class="menu">
					<button onclick='window.location.href="event.php"'>Back to Events</button>
				</div>
			</div>
		</div>
	</body>
</html> 