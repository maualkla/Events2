<?php include("php/sesion.php"); ?>
<?php
/* Users PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 21th, 2019
	--> Description: Menu page for the users module
	--> Dependencies:   connection.php ( For the DB connection ) php/adduser.php (For adding users)
						css/design.css (For the styles)
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Events / Users</title>
		<link rel="shortcut icon" href="assets/events-beta-icon.png">
		<link rel=StyleSheet href= "css/design.css" type="text/css">
		<script type = "text/javascript" src="javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="container">
			<div class="" id="error-msg">
				<?php
					$param = ""; $param = $_REQUEST['param'];
					$option = ""; $option = $_REQUEST['option'];
					$display = 0;
					if($option == '1')
					{
						//edit
						$sql = 'SELECT * FROM user WHERE userid = "'.$param.'"';
						require_once('php/connection.php');
						$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						$display = 1;
					}
					elseif($option == '2')
					{
						//delete
						$sql = 'DELETE FROM user WHERE userid = '.$param;
						require_once('php/connection.php');
						$delete_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						header('Location: users.php?pe=7');
					}
					elseif($option == '3')
					{
						//update
						// ---> Falta validar parametros
						$sql = 'UPDATE user SET fname = "'.$_REQUEST['fname'].'", lname = "'.$_REQUEST['lname'].'", email = "'.$_REQUEST['email'].'", nickname = "'.$_REQUEST['nickname'].'" WHERE userid = "'.$param.'"';
						echo $sql;
						require_once('php/connection.php');
						$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						header('Location: users.php?pe=6');
					}
					elseif($option == '4')
					{
						//Change pass	
						$pass = ""; $pass = $_REQUEST['ps'];
						$step = false;
						$decodepass = base64_decode($pass);
						echo 'ORIGINAL : '.$pass.' :::: DECODED :: '.$decodepass;
						$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
		    			$cryptcontra = password_hash($decodepass, PASSWORD_DEFAULT, $options);
		    			echo $_SESSION['id_user'];
		    			$sql = 'SELECT password FROM user WHERE userid = "'.$_SESSION['id_user'].'" AND password = "'.$cryptcontra.'"';
		    			require_once('php/connection.php');
		    			$validating_pass = mysqli_query($dbc, $sql) or die (" Error: ".mysqli_error($dbc));
		    			mysqli_close($dbc);
		    			// Aqui validamos la pass
		    			while($row = mysqli_fetch_array($validating_pass, MYSQLI_BOTH))
		    			{
		    				$step = true;
		    				echo 'ENTRO A STEP';
		    			}
		    			if($step) 
	    				{
	    					header('Location: php/setpass.php?option=1&param='.$param.'&auth=true');
	    				}
	    				else
	    				{
	    					header('Location: users.php?pe=8');
	    				}
					}
					else
					{
						//nothing
						if($param != "")
						{
							$sql = "SELECT * FROM user WHERE fname LIKE '%".$param."%' OR lname LIKE '%".$param."%' OR nickname LIKE '%".$param."%' OR userid LIKE '%".$param."%'";
							require_once("php/connection.php");
						    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
						    mysqli_close($dbc);
						    $display = 2;
						}
						else
						{
							// No seek
						}
					}
					
				?>
			</div>
			<div class="top">
				<h2>Users page</h2>
			</div>
			<div class="menu">
				<h3><a href="inicio.php">Back to Home</a></h3>
				<h3><a href="php/adduser.php">Add User</a></h3>
			</div>
			<div class="content">
				<div class="form">
					<form action="users.php" method="POST">
						<h5> USER ID OR NAME </h5>
						<input type="text" placeholder="ID, NICKNAME OR NAME" value="" name="param">
						<input type="submit" value="SEARCH"/>
					</form>
				</div>
				<div class="content-table <?php if($display == 2){echo'display';}else{echo 'hide';} ?>">
					<table class="">
						<tr>
							<th> ID </th>
							<th> Name </th>
							<th> Lastname </th>
							<th> Email </th>
							<th> Nickname </th>
							<th> Options </th>
						</tr>
						<?php
							while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) 
						    {
						        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td> <button onclick='changePass(".$row[0].")'> CHANGEPASS </button> - <button onclick='goToEdit(".$row[0].")'> EDIT </button> - <button onclick='confirmDelete(".$row[0].")'> DELETE </button> </tr>";
						    }
						?>
					</table>
				</div>
				<div class="content-table <?php if($display == 1 ){echo'display';}else{echo 'hide';} ?>">
					<table class="">
						<tr> 
							<th> ID </th>
							<th> Name </th>
							<th> Lastname </th>
							<th> Email </th>
							<th> Nickname </th>
							<th> Options </th>
						</tr>
						<form action="users.php?option=3&param=<?php echo $param; ?>" method="POST">
							<?php
								while($row = mysqli_fetch_array($edit_result, MYSQLI_BOTH)) 
							    {
							        echo "<tr><td><input type='text' value='".$row[0]."' name='userid' disabled='true'></td><td><input type='text' value='".$row[1]."' name='fname' ></td><td><input type='text' value='".$row[2]."' name='lname'></td><td><input type='text' value='".$row[3]."' name='email' ></td><td><input type='text' value='".$row[4]."' name='nickname'></td><td> <input type='submit' value='SAVE'></form> - <button onclick='resetPage()'> CANCEL </button> - <button onclick='confirmDelete(".$row[0].")'> DELETE </button> </tr>";
							    }
							?>
						
					</table>
				</div>
			</div>
		</div>
		<script type="text/javascript">
	 		
		</script>
	</body>
</html>