<?php include("../system/sesion.php"); ?>
<?php
/* Event PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 23rd, 2019
	--> Last Edition: May 13th, 2019
	--> Description: Main page of the Events module
	--> Dependencies:   connection.php ( For the DB connection ) 
************************************************************************************************* */
?>
<!DOCTYPE html> 
<html>
	<head>
		<title><?php echo $_SESSION['title'] ; ?> / Events</title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="">
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
							$sql = 'SELECT * FROM event WHERE eventid LIKE "%'.$param.'%" OR event_name LIKE "%'.$param.'%" OR event_short_name LIKE "%'.$param.'%"';
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
							# update
							if(isset($_REQUEST['event_name']) == true && isset($_REQUEST['event_short_name']) == true && isset($_REQUEST['event_descr']) && isset($_REQUEST['event_start']) == true && isset($_REQUEST['event_stop']) == true)
							{
								$param = $_REQUEST['param'];
								$sql = 'UPDATE event SET event_name = "'.$_REQUEST['event_name'].'", event_short_name = "'.$_REQUEST['event_short_name'].'", event_descr = "'.$_REQUEST['event_descr'].'", event_start = "'.$_REQUEST['event_start']." ".$_REQUEST['event_start_t'].':00'.'", event_stop = "'.$_REQUEST['event_stop']." ".$_REQUEST['event_stop_t'].':00'.'" WHERE eventid = "'.$param.'"';
								echo $sql;
								require_once('../system/connection.php');
								$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
								mysqli_close($dbc);
								header('Location: event.php?pe=12');
							}
								
							break;
						case '4':
							#delete
							break;
						case '5':
							#create
							if(isset($_REQUEST['event_name']) == true && isset($_REQUEST['event_short_name']) == true && isset($_REQUEST['event_descr']) && isset($_REQUEST['event_start']) == true && isset($_REQUEST['event_stop']) == true)
							{
								
								$sql = 'INSERT INTO event (eventid, event_name, event_descr, event_short_name, event_start, event_stop, owner_name, owner_descr, owner_short_name, userid) VALUES ("", "'.$_REQUEST['event_name'].'", "'.$_REQUEST['event_descr'].'", "'.$_REQUEST['event_short_name'].'", "'.$_REQUEST['event_start']." ".$_REQUEST['event_start_t'].':00'.'", "'.$_REQUEST['event_stop']." ".$_REQUEST['event_stop_t'].':00'.'", "'.$_REQUEST['owner_name'].'", "'.$_REQUEST['owner_descr'].'", "'.$_REQUEST['owner_short_name'].'", "'.$_REQUEST['userid'].'") ';
								echo $sql;
								require_once("../system/connection.php");
							    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
							    mysqli_close($dbc);

							    echo $_REQUEST['event_stop']." ".$_REQUEST['event_stop_t'];
							    header('Location: event.php?pe=13');
							}
							$display = 3;
							break;
						default:
							
							break;
					}
				}
			?>
		</div>
		<div class="" id="error-msg">
		</div>
		<div class="container">
			<div class="top">
				<div class="top-title">
					<img class="t-t-img" src="/Events/assets/events-beta.png">
					<h2>Events main</h2>
				</div>
				<div class="c-buscador">
					<form action="event.php?option=1" method="POST">
						<div class="c-b-box">
							<input class="input-search" type="text" name="param">
							<input class="sub-button" type="submit" value="Search Event">
						</div>
					</form>
				</div>
				<div class="menu">
				<?php if($display != 3){ ?>
					<button onclick='window.location.href="../../inicio.php"'>Back to Home</button>
					<button onclick='window.location.href="event.php?option=5"'>Create New Event</button>
				<?php }else{ ?>
					<button onclick='window.location.href="event.php"'>Back to Events</button>
				<?php } ?>
				</div>
			</div>
			<?php if($display != 3){ ?>
			<div class="content">
				<div>
					
				</div>
			<?php } ?>
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
				<?php if(isset($_REQUEST['val']) == true)
				{ ?>
				<?php $row = mysqli_fetch_array($event_result2, MYSQLI_BOTH); ?>
				<div class="display-settings ">
					<div class="settings-card-edit">
						<button onclick="window.location.href = 'event.php?option=2&param=<?php echo $row[0]; ?>'">Cancel Edition</button>
						<form action="event.php?option=3&param=<?php echo $row[0]; ?>" method="POST">
							<div class="sc-banner">
								<h6><?php echo $row['eventid']; ?></h6>
							</div>
							<div class="sc-title">
								<div class="sc-tt-left">
									<h3><input name='event_name' type='text' value='<?php echo $row['event_name']; ?>' ></h3>
									<h1><input name='event_short_name' type='text' value='<?php echo $row['event_short_name']; ?>'></h1>
								</div>
								<div class="sc-tt-right">
									<p><input name='event_descr' type='text' value='<?php echo $row['event_descr']; ?>' ></p>
								</div>
							</div>
							<div class="sc-content">
								<div class="sc-content-left"><?php echo $row['event_start']; ?><input name='event_start' type='date' value='<?php echo $row['event_start']; ?>'><input name='event_start_t' type='time' value='<?php echo $row['event_start']; ?>'></div>
								<div class="sc-content-right"><?php echo $row['event_stop']; ?><input name='event_stop' type='date' value='<?php echo $row['event_stop']; ?>' ><input name='event_stop_t' type='time' value='<?php echo $row['event_stop']; ?>' ></div>
							</div>
							<input class="sub-button" type="submit" value="Save Changes">
						</form>
						<div class="sc-content-down">

						</div>
					</div>
				</div>
			<?php } 
				else ?>
			<?php { ?>
				<?php $row = mysqli_fetch_array($event_result2, MYSQLI_BOTH); ?>
				<div class="display-settings ">
					<div class="settings-card">
						<button onclick="window.location.href = 'event.php?option=2&param=<?php echo $row[0]; ?>&val=1'">Edit Event</button>
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
			<?php } 
			}
			elseif($display == 3){?>
				<div class="form_new_event">
					<form action="event.php?option=5" method="POST">
						<p>Event Name</p>
						<input name="event_name" type="text" value="" placeholder="My event" required>
						<p>Event Description</p>
						<input name="event_descr" type="text" value="" placeholder="Event for those days" required>
						<p>Event Short Name</p>
						<input name="event_short_name" type="text" value="" placeholder="My short event name" required>
						<p>Event Start Date and Time</p>
						<input name="event_start" type="date" value="" required><input name="event_start_t" type="time" value="" required>
						<p>Event Finish Date and Time</p>
						<input name="event_stop" type="date" value="" required><input name="event_stop_t" type="time" value="" required>
						<p>Owner Name</p>
						<input name="owner_name" type="text" value="" placeholder="My Org Name" required>
						<p>Owner Description</p>
						<input name="owner_descr" type="text" value="" placeholder="My org Description" required>
						<p>Owner Short Name</p>
						<input name="owner_short_name" type="text" value="" placeholder="MyOrg short name" required>
						<p>User Owner</p>
						<input name="userid" type="text" value="" placeholder="User Owner" required>
						<input type="submit" name="" value="Create" class="sub-button">
					</form>
				</div>
			<?php } ?>
			</div>
		</div>
	</body>
</html>