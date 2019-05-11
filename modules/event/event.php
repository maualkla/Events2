<?php include("../system/sesion.php"); ?>
<?php
/* Event PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 23rd, 2019
	--> Last Edition: April 23rd, 2019
	--> Description: Main page of the Events module
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Event</title>
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
				<h2>Events main</h2>
			</div>
			<div class="menu">
				<h3><a href="../../inicio.php">Back to Home</a></h3>
				<h3><a href="event.php?option=1">Create New Event</a></h3>
				<h3><a href="play.php?param=0">Go To Event Screen</a></h3>
			</div>
		</div>
	</body>
</html>