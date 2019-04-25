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
					if(isset($_REQUEST['option']))
					{
						$display = 0;
						$option = $_REQUEST['option'];
						switch ($option) 
						{
							case '2':
								# Query
								$param = $_REQUEST['param'];
								$sql = 'SELECT * FROM event WHERE eventid LIKE "%'.$param.'%" OR event_name LIKE "%'.$param.'%"';
								require_once('../system/connection.php');
								$event_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
								mysqli_close($dbc);
								$display = 1;
								break;
							
							default:
								
								break;
						}
					}
				?>
			</div>
			<div class="top">
				<h2>Events main</h2>
			</div>
			<div class="menu">
				<h3><a href="../../inicio.php">Back to Home</a></h3>
				<h3><a href="event.php?option=1">Create New Event</a></h3>
				<h3></h3>
			</div>
			<div class="form_new_event">
			</div>
			<div class="content">
				<h5>Buscar Evento por Nombre o Id</h5>
				<form action="event.php?option=2" method="POST">
					<input type="text" name="param">
					<input type="submit" value="Search Event">
				</form>
			</div>
			<div class="display-results <?php if($display == 1){echo "display";}else{echo "hide";} ?>">
				<table>
					<tr>
						<th>Event ID</th>
						<th>Event Name</th>
						<th>Event Start</th>
						<th>Event Finish</th>
						<th>Owner</th>
						<th>User owner</th>
						<th>Options</th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($event_result,  MYSQLI_BOTH))
						{
							echo '<tr><td>'.$row['eventid'].'</td><td>'.$row['event_name'].'</td><td>'.$row['event_start'].'</td><td>'.$row['event_stop'].'</td><td>'.$row['owner_name'].'</td><td>'.$row['userid'].'</td><td> <a href="play.php?param='.$row['eventid'].'">Go To Event Screen</a> </td></tr>';
						}
					?>
				</table>	
			</div>
		</div>
	</body>
</html>