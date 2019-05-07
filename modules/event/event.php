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
					$display = 0;
					if(isset($_REQUEST['option']))
					{
						$option = $_REQUEST['option'];
						switch ($option) 
						{
							case '1':
								# Query
								$param = $_REQUEST['param'];
								$sql = 'SELECT * FROM event WHERE eventid LIKE "%'.$param.'%" OR event_name LIKE "%'.$param.'%"';
								require_once('../system/connection.php');
								$event_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
								mysqli_close($dbc);
								$display = 1;
								break;
							case '2':
								$param = $_REQUEST['param'];
								$sql = 'SELECT * FROM event WHERE eventid = "'.$param.'"';
								require_once('../system/connection.php');
								$event_result2 = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
								mysqli_close($dbc);
								$display = 2;
								break;
							case '3':
								# delete
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
				<h3><a href="createevent.php?option=1">Create New Event</a></h3>
				<h3></h3>
			</div>
			<div class="form_new_event">
			</div>
			<div class="content">
				<h5>Buscar Evento por Nombre o Id</h5>
				<form action="event.php?option=1" method="POST">
					<input type="text" name="param">
					<input type="submit" value="Search Event">
				</form>
			</div>
		<?php if($display == 1){ ?><!--echo "display";}else{echo "hide";} ?>"-->
			<div class="display-results ">
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
							echo '<tr><td>'.$row['eventid'].'</td><td>'.$row['event_name'].'</td><td>'.$row['event_start'].'</td><td>'.$row['event_stop'].'</td><td>'.$row['owner_name'].'</td><td>'.$row['userid'].'</td><td> <a href="play.php?param='.$row['eventid'].'">Go To Event Screen</a> - <button onclick="window.location.href=\'event.php?option=2&param='.$row['eventid'].'\';"> Event Settings </button> <button onclick="window.location.href = \'events.php?option=3&param='.$row['eventid'].'\'";> Delete </button></td></tr>';
						}
					?>
				</table>	
			</div>
		<?php } elseif($display == 2){?>
			<?php $row = mysqli_fetch_array($event_result2, MYSQLI_BOTH); ?>
			<div class="display-settings ">
				<div class="settings-card">
					<div class="sc-banner">
						<h6><?php echo $row['eventid']; ?></h6>
					</div>
					<div class="sc-title">
						<div class="sc-tt-left">
							<h3><?php echo $row['event_name']; ?></h3>
							<h1><?php echo $row['event_short_name']; ?></h1>
						</div>
						<div class="sc-tt-right">
							<p><?php echo $row['event_descr']; ?></p>
						</div>
					</div>
					<div class="sc-content">
						<div class="sc-content-left"><?php echo $row['event_start']; ?></div>
						<div class="sc-content-right"><?php echo $row['event_stop']; ?></div>
					</div>
					<div class="sc-content-down">

					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</body>
</html>