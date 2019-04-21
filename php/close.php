<?php
/* Close PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 20th, 2019
	--> Description: Close sesion file.
	--> Dependencies:   connection.php ( For the DB connection )
************************************************************************************************* */
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Closing sesion </title>
		<link rel="shortcut icon" href="../assets/events-beta-icon.png">
		<link rel=StyleSheet href= "../css/design.css" type="text/css">
	</head>
	<body>
		<div class="error">
		<?php
			session_start();
			session_destroy();
			header("Location: ../index.html?pe=2");
		?>
		</div>
		<h3>Closing sesion</h3>
	</body>
</html>