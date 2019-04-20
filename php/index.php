<?php
/* Index PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 20th, 2019
	--> Description: Validate the user nickname and password, then create a session for the user or redirect it to the index.html page.
	--> Dependencies:   connection.php ( For the DB connection )
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Validating Password</title>
		<link rel="shortcut icon" href="../assets/events-beta-icon.png">
		<link rel=StyleSheet href= "../css/design.css" type="text/css">
	</head>
	<body>
		<div class="error">
		<?php

			$si = 0;
		    $contra = $_REQUEST['contra'];
		    $cryptcontra = password_hash($contra, PASSWORD_BCRYPT); echo " ORIGINAL : ". $contra ." :: BCRYPT : ".$cryptcontra;
		    $user = $_REQUEST['user'];
		    $sql = "select * from user";
		    require_once("connection.php");
		    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
		    mysqli_close($dbc);
		    while($row = mysqli_fetch_array($result, MYSQLI_BOTH )) 
		    {
		        if(( $contra == $row[5])&&( $user == $row[4]))
				{
					$si++;
					$id_user = $row[0];
				}
		    }
		    if( $si == 1)
		    {
		        // Iniciamos una sesion en el sitio en caso de que si este correcto el usuario y contraseña.
		        $sesionhash = password_hash("Sesion_iniciada_legalmente", PASSWORD_BCRYPT);
		        session_start();
		        $_SESSION['sesion'] = $sesionhash; 
		        $_SESSION['id_user'] = $id_user;
		        header('Location: ../inicio.php');
		    }
		    else
		    {
		        header('Location: ../index.html?pe=1');
		    }
		?>

		</div>
	</body>
</html>