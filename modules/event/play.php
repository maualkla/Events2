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
		<div class="container">
			<div class="" id="error-msg">
				<?php
				?>
			</div>
			<div class="top">
				<h2>Play Event</h2>
			</div>
			<div class="menu">
				<h3><a href="event.php">Back to Events</a></h3>
			</div>
		</div>
	</body>
</html>