<?php include("../system/sesion.php"); ?>
<?php
/* Create Event PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 25th, 2019
	--> Last Edition: April 25th, 2019
	--> Description: Page to create a new event
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Event</title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="container">
			<div class="" id="error-msg">
				<?php
				?>
			</div>
			<div class="top">
				<h2>Create New Event</h2>
			</div>
			<div class="menu">
				<h3><a href="event.php">Back to Events</a></h3>
			</div>
		</div>
	</body>
</html>