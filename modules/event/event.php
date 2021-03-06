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
							$param = $_REQUEST['param'];
							$sql = 'DELETE FROM event WHERE eventid = '.$param;
							echo $sql;
							require_once('../system/connection.php');
							$delete_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
							mysqli_close($dbc);
							header('Location: /Events/modules/event/event.php?pe=7');
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
		<div class="top">
			<div class="top-title">
				<img class="t-t-img" src="/Events/assets/events-beta.png">
				<div class="h1title">Events main</div>
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
		<div class="container">
			<?php if($display != 3){ ?>
			<div class="content">
				<div>
					
				</div>
			<?php } ?>
			<?php if($display == 1){ ?><!--echo "display";}else{echo "hide";} ?>"-->
				<div class="content-cards">
						<?php
							while($row = mysqli_fetch_array($event_result,  MYSQLI_BOTH))
							{ ?>
					<div class="c-c-card">
						<div class="ccc-1">
							<?php echo $row['eventid']; ?>
						</div>
						<div class="ccc-2">
							<div class="ccc2-1">
				 				<div class="ccc21-1" style="font-size: 70%;">#<?php echo substr($row['event_short_name'], 0, 10); ?></div>
				 				<div class="ccc21-2" style="font-size: 70%; margin-top: -6px;"> <?php echo substr($row['owner_short_name'], 0, 10); ?></div>
				 			</div>
				 			<div class="ccc2-2"><img style="margin-top: -10px;" src="../../assets/events-beta-icon.png" class="thumb-img"></div>
						</div>
						<div class="ccc-3">
							Starts: <?php echo $row['event_start']; ?>
						</div>
						<div class="ccc-4">
				 			<?php echo $row['event_name']; ?>
				 		</div>
				 		<div class="ccc-5">
				 			<button class="card-button" onclick='window.location.href="play.php?param=<?php echo $row['eventid']; ?>"'> Play Event </button>
				 			<button class="card-button" onclick="window.location.href='event.php?option=2&param=<?php echo $row['eventid']; ?>'"> Event Settings </button>
				 			<button class="card-button" onclick="confirmDelete('<?php echo $row[0]; ?>', 'event', '4')"> Delete Event</button>
				 		</div>
						<!--?php	echo '<tr><td>'..'</td><td>'..'</td><td>'..'</td><td>'..'</td><td>'.$row['owner_name'].'</td><td>'.$row['userid'].'</td><td> <a href="play.php?param='.$row['eventid'].'">Go To Event Screen</a> - <button onclick="window.location.href=\'event.php?option=2&param='.$row['eventid'].'\';"> Event Settings </button> <button onclick=\'confirmDelete('.$row[0].', "event", "4")\'> Delete </button></td></tr>';
						?-->
					</div>
				<?php
						}
					?>
				</div>
			<?php } elseif($display == 2){?>
				<?php $row = mysqli_fetch_array($event_result2, MYSQLI_BOTH); ?>
				
				<div class="content-big-card">
					<div class="cbc-1">
						Event ID: <?php echo $row['eventid']; ?>
					</div>
					<div class="cbc-2">
						<form action="event.php?option=3&param=<?php echo row[0]; ?>" class="cbc2-1">
							<input class="cbc21-1" type="text" value="<?php echo $row['event_name']; ?>" name="event_name" placeholder="Event Name" required>
							<input class="cbc21-2" type="text" value="<?php echo $row['owner_name']; ?>" disabled placeholder="Event Description" required>
							<input class="cbc21-3" type="text" value="<?php echo $row['event_descr']; ?>" name="event_descr" placeholder="Event Description" required>
							<div class="cbc21-4">
								<input class="" type="date" value="<?php echo $row['event_start']; ?>" name="event_start" required>
								<input class="" type="time" value="<?php echo $row['event_start']; ?>" name="event_start_t" required>
							</div>
							<div class="cbc21-4">
								<input class="" type="date" value="<?php echo $row['event_stop']; ?>" name="event_stop" required>
								<input class="" type="time" value="<?php echo $row['event_stop']; ?>" name="event_stop_t" required>
							</div>
							<input class="cbc21-3" type="text" value="<?php echo $row['event_short_name']; ?>" name="event_short_name" placeholder="#Hastag" required>
							<button class='card-button' onlick="window.sonsole.log('hello');" id="cbc21-6"> Save User Info</button>
						</form>
						<div class="cbc2-2">
							<img src="../../assets/events-beta-icon.png" class="big-img">
						</div>
					</div>
					<div class="cbc-3">
						
					</div>
				</div>
			<?php 
			}
			elseif($display == 3){?>


				<div class="generic-card big-card">
					<div class="gc-head little-box">
						<div class="">
							ID #1323
						</div>
						<div class="">
							Title One
						</div>
					</div>
					<div class="gc-body">
						
					</div>
					<div class="gc-footer">
					</div>
				</div>


				<div class="generic-card medium-card">
					<div class="gc-head">
					</div>
					<div class="gc-body">
					</div>
					<div class="gc-footer">
					</div>
				</div>

				<div class="generic-card little-card">
					<div class="gc-head">
					</div>
					<div class="gc-body">
					</div>
					<div class="gc-footer">
					</div>
				</div>






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