<?php
/* Sesion PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 21th, 2019
	--> Last Edition: April 21th, 2019
	--> Description: File who verify the session of the user.
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Redirecting </title>
		<link rel="shortcut icon" href="../assets/events-beta-icon.png">
		<link rel=StyleSheet href= "../css/design.css" type="text/css">
	</head>
	<body>
		<div class="error">
			<?php

				@session_start();
				$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
				$sesionhash = password_hash("Sesion_iniciada_legalmente", PASSWORD_DEFAULT, $options);
				if($_SESSION['sesion'] != $sesionhash)
				{
				    // En caso de no haber iniciado sesion, se le redirecciona.
				    header("Location: ../index.html?pe=9");
				    exit();
				}

			?>
		</div>
		<h3>Redirecting</h3>
	</body>
</html>