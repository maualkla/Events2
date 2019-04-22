<?php include("php/sesion.php"); ?>
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
		<link rel="shortcut icon" href="assets/events-beta-icon.png">
		<link rel=StyleSheet href= "css/design.css" type="text/css">
		<script type = "text/javascript" src="javascript/functions.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="" id="error-msg">
				<?php
				?>
			</div>
			<div class="top">
				<h2>Here is the main page.</h2>
			</div>
			<div class="menu">
				<h3><a href="php/close.php">Close Sesion</a></h3>
				<h3><a href="users.php">Users Module</a></h3>
			</div>
		</div>
	</body>
</html>