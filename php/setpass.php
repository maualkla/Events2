<?php include("sesion.php"); ?>
<?php
/* setpass PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 21th, 2019
	--> Last Edition: April 21th, 2019
	--> Description: Page where the user set the password
	--> Dependencies:   connection.php ( For the DB connection ) 
						css/design.css (For the styles)
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Events / Users / Set Pass</title>
		<link rel="shortcut icon" href="../assets/events-beta-icon.png">
		<link rel=StyleSheet href= "../css/design.css" type="text/css">
		<script type = "text/javascript" src="../javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="container">
			<div class="" id="error-msg">
				<?php
					$option = ""; $option = $_REQUEST['option'];
					$param =  ""; $param = $_REQUEST['param'];
					$auth = ""; $auth = $_REQUEST['auth'];
					if($option == "2" && $auth == 'true' && $param != "")
					{
						$pass1 = ""; $pass1 = $_REQUEST['p1'];
						$pass2 = ""; $pass2 = $_REQUEST['p2'];
						if(($pass1 != "" && $pass2 != "") && ($pass1 == $pass2) && (strlen($pass1) > 3))
						{
							$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
		    				$cryptcontra = password_hash($pass1, PASSWORD_DEFAULT, $options); 
		    				$sql = 'UPDATE user SET password = "'.$cryptcontra.'" WHERE userid = "'.$param.'"';
							echo $sql;
							require_once('connection.php');
							$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
							mysqli_close($dbc);
							header('Location: ../users.php?pe=10');
						}
						else
						{
							header('Location: setpass.php?pe=9');
						}
					}
				?>
			</div>
			<div class="top">
				<h2>Set the new password</h2>
			</div>
			<div class="menu">
				<h3><a href="../users.php">Back</a></h3>
			</div>
			<div class="content">
				<form method="POST" action="setpass.php?option=2&param=<?php echo $param; ?>&auth=true">
					<h4> Type the password </h4>
					<input type="password" value="" name="p1">
					<h4> Type again </h4>
					<input type="password" value="" name="p2">
					<input type="submit" name="" value="Change Pass">
				</form>
			</div>
		</div>
	</body>
</html>