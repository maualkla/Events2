<?php
/* Conection PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 13th, 2019
	--> Last Edition: April 13th, 2019
	--> Description: Function to create a conection used in all the project.
	--> Dependencies:   none 
************************************************************************************************* */
// Set credentials
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "evnt";

//check connection
    $dbc = mysqli_connect($servername,$username,$password,$dbname);
    if (!$dbc) {
        die("Connection failed" . mysqli_connect_error());
    }
    else
    {
    	//echo "ok";
    }
?>