<?php include("../system/sesion.php"); ?>
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
		<title><?php echo $_SESSION['title'] ; ?> / Users</title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="" id="error-msg">
			<?php
			// New Version
			$display = 0;
			if(isset($_REQUEST['option']) && isset($_REQUEST['param']))
			{

				$option = $_REQUEST['option'];
				$param = $_REQUEST['param'];
				switch ($option) {
					case '0':
						$sql = "SELECT * FROM user WHERE fname LIKE '%".$param."%' OR lname LIKE '%".$param."%' OR nickname LIKE '%".$param."%' OR userid LIKE '%".$param."%'";
						require_once('../system/connection.php');
					    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
					    mysqli_close($dbc);
					    $display = 2;
						break;
					
					case '1':
						//Seek
						$sql = 'SELECT * FROM user WHERE userid = "'.$param.'"';
						require_once('../system/connection.php');
						$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						$display = 1;
						break;

					case '2':
						//delete
						$sql = 'DELETE FROM user WHERE userid = '.$param;
						require_once('../system/connection.php');
						$delete_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						header('Location: /Events/modules/users/users.php?pe=7');
						break;

					case '3':
						//update
						// -> Falta validar parametros
						$sql = 'UPDATE user SET fname = "'.$_REQUEST['fname'].'", lname = "'.$_REQUEST['lname'].'", email = "'.$_REQUEST['email'].'", nickname = "'.$_REQUEST['nickname'].'", level = "'.$_REQUEST['level'].'" WHERE userid = "'.$param.'"';
						echo $sql;
						require_once('../system/connection.php');
						$edit_result = mysqli_query($dbc, $sql) or die ("Error: ".mysqli_error($dbc));
						mysqli_close($dbc);
						header('Location: users.php?pe=6');
						break;

					case '4':
						//Change pass	
						$pass = ""; $pass = $_REQUEST['ps'];
						$step = false;
						$decodepass = base64_decode($pass);
						echo 'ORIGINAL : '.$pass.' :::: DECODED :: '.$decodepass;
						$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
		    			$cryptcontra = password_hash($decodepass, PASSWORD_DEFAULT, $options);
		    			echo $_SESSION['id_user'];
		    			$sql = 'SELECT password FROM user WHERE userid = "'.$_SESSION['id_user'].'" AND password = "'.$cryptcontra.'"';
		    			require_once('../system/connection.php');
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
	    					header('Location: setpass.php?option=1&param='.$param.'&auth=true');
	    				}
	    				else
	    				{
	    					header('Location: users.php?pe=8');
	    				}
						break;

					case '5':

						break;
					default:
						# code...
						break;
				}
			}
			?>
		</div>
		<div class="top">
			<div class="top-title">
				<img class="t-t-img" src="/Events/assets/events-beta.png">
				<div class="h1title">Users page</div>
			</div>
			<div class="c-buscador">
				<form action="/Events/modules/users/users.php?option=0" method="POST">
					<div class="c-b-box">
						<input type="text" class="input-search" value="" name="param">
						<input class="sub-button" type="submit" value="SEARCH"/>
					</div>
				</form>
			</div>
			<div class="menu">
				<button onclick="window.location.href ='/Events/inicio.php'">Back to Home</button>
				<button onclick="window.location.href ='/Events/modules/users/adduser.php'">Add User</button>
			</div>
		</div>
		<div class="container">
			
			<div class="content">
				<div>
					
				</div>
				<!-- Display Results table -->
				<?php if($display == 2){?>
				<div class="content-cards">
				<?php
					while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
				 	{ ?>
				 	<div class="c-c-card">
				 		<div class="ccc-1">
				 			<?php echo $row[0]; ?>
				 		</div>
				 		<div class="ccc-2">
				 			<div class="ccc2-1">
				 				<div class="ccc21-1"><?php echo substr($row[1], 0, 10); ?></div>
				 				<div class="ccc21-2"><?php echo substr($row[2], 0, 6); ?></div>
				 			</div>
				 			<div class="ccc2-2"><img src="../../assets/events-beta-icon.png" class="thumb-img"></div>
				 		</div>
				 		<div class="ccc-3">
				 			<?php echo $row[3]; ?>
				 		</div>
				 		<div class="ccc-4">
				 			Nivel de Acceso <?php echo $row[6]; ?>
				 		</div>
				 		<div class="ccc-5">
				 			<button class="card-button" onclick='changePass("<?php echo $row[0]; ?>")'> Set Password </button>
				 			<button class="card-button" onclick='goToEdit("<?php echo $row[0]; ?>")'> Edit User </button>
				 			<button class="card-button" onclick='confirmDelete("<?php echo $row[0]; ?>", "users", "2")'> Delete User </button>
				 		</div>
				 	<!--?php
				        echo "<div>".$row[0]."</div><div>".$row[1]."</div><div>".$row[2]."</div><div>".$row[3]."</div><div>".$row[4]."</div><div>".$row[6]."</div><div><button onclick='changePass(".$row[0].")'> CHANGEPASS </button> - <button onclick='goToEdit(".$row[0].")'> EDIT </button> - <button onclick='confirmDelete(".$row[0].", \"users\", \"2\")'> DELETE </button> </div>";
				    ?--->
					</div>
				    <?php
				    }
				?>
				</div>
				<?php }?>
				<!-- Display Editable table -->
				<?php if($display == 1 ){?>
				<div class="content-big-card">
					<?php
						while($row = mysqli_fetch_array($edit_result, MYSQLI_BOTH)) 
					    { ?>
					    <div class="cbc-1">
							User Code: <mark class="medium-mark"><?php echo $row[0]; ?></mark>
						</div>
						<div class='cbc-2'>
							<form class="cbc2-1" action="users.php?option=3&param=<?php echo $param; ?>" method="POST"-->
						
								<div>
									<input type='text' value='<?php echo $row[1]; ?>' name='fname' id='edit_2' >
								</div>
								<div>
									<input type='text' value='<?php echo $row[2]; ?>' name='lname' id='edit_3'>
								</div>
								<div>
									<input type='text' value='<?php echo $row[3]; ?>' name='email' id='edit_4'>
								</div>
								<div>
									<input type='text' value='<?php echo $row[4]; ?>' name='nickname' id='edit_5'>
								</div>
								<div>
									<input type='text' value='<?php echo $row[6]; ?>' name='level' id='edit_6'>
								</div>
								<div> 
									<!--input type='submit' class="card-button" value='Save User Data'-->
									<button class='card-button' onlick="updateRequest('users', '<?php #echo $row[0]; ?>')"> Save User Info</button>
								</div>
							</form> 
							<div class="cbc2-2">
								IMG
							</div>
						</div>
					
						
						<div>
							<button onclick='resetPage("users", "<?php echo $row[0]; ?>", "0")' class='card-button'> Cancel Edition </button> 
						</div>
					<?php }
					?>
				</div>
			<?php } ?>
			</div>
		</div>
		<script type="text/javascript">
	 		
		</script>
	</body>
</html>