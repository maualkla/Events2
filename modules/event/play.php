<?php include("../system/sesion.php"); ?>
<?php
/* Play PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 23rd, 2019
	--> Last Edition: April 23rd, 2019
	--> Description: Page to view the events.
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<?php
	if(isset($_REQUEST['param']))
	{
		$sql = 'SELECT * FROM event WHERE eventid = "'.$_REQUEST['param'].'" limit 1';
		require_once('../system/connection.php');
		$event_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
		mysqli_close($dbc);
		$event = mysqli_fetch_array($event_result);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_SESSION['title']." / Play ".$event['event_name'] ; ?> </title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="" id="error-msg">
			<?php
			?>
		</div>
		<div class="container">
			
			<div class="top">
				<div class="top-title">
					<img class="t-t-img" src="/Events/assets/events-beta.png">
					<h2>Play Event</h2>
				</div>
				<div></div>
				<div class="menu">
					<button onclick='window.location.href="event.php"'>Back to Events</button>
				</div>
			</div>
			<div class="mega-title"><?php echo $event['event_short_name']; ?></div>
			<div class="live-title">LIVE</div>
		</div>
	</body>
</html> 