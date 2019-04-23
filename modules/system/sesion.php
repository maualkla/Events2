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

<?php

	@session_start();
	$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
	$sesionhash = password_hash("Sesion_iniciada_legalmente", PASSWORD_DEFAULT, $options);
	if($_SESSION['sesion'] != $sesionhash)
	{
	    // En caso de no haber iniciado sesion, se le redirecciona.
	    header("Location: ../../index.html?pe=9");
	    exit();
	}

?>
