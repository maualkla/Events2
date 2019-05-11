<?php include("modules/system/sesion.php"); ?>
<?php
/* Inicio PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 21th, 2019
	--> Description: Main page of the Events system
	--> Dependencies:   connection.php ( For the DB connection ) php/close.php ( For destroing sesion)
						users.php (Users module)
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Events</title>
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
				<div class='top-title'><h2>Here is the main page.</h2></div>
				<div class="menu">
					<button onclick='window.location.href="modules/system/close.php"'>Close Sesion</button>
					<button onclick='window.location.href="modules/users/users.php"'>Users Module</button>
					<button onclick='window.location.href="modules/event/event.php"'>Events Module</button>
				</div>
			</div>
			
		</div>
	</body>
</html>