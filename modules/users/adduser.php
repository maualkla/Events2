<?php include("../system/sesion.php"); ?>
<?php
/* AddUser PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 21th, 2019
	--> Description: Page focus in add new users
	--> Dependencies:   connection.php ( For the DB connection ) css/design.css (For the styles)
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_SESSION['title'] ; ?> / Users </title>
		<link rel="shortcut icon" href="/Events/assets/events-beta-icon.png">
		<link rel=StyleSheet href= "/Events/css/design.css" type="text/css">
		<script type = "text/javascript" src="/Events/javascript/functions.js"></script>
	</head>
	<body onload="alerts()">
		<div class="" id="error-msg">
		</div>
		<div class="" id="msg">
			<?php
				if(isset($_REQUEST['option']) == true)
				{
					if(isset($_REQUEST['fname']))
					{
						$fname = $_REQUEST['fname'];
						$lname = ""; $lname = $_REQUEST['lname'];
						$email = ""; $email = $_REQUEST['email'];
						$alias = ""; $alias = $_REQUEST['alias'];
						$contra = ""; $contra = $_REQUEST['pass'];
						$level = ""; $level = $_REQUEST['level'];
						$options = [ 'salt' => "ASI99221111000__s¡??0popopop22MQVANDMEAL" ];
						$password = password_hash($contra, PASSWORD_DEFAULT, $options);
						if($fname != "" && $lname != "" && $email != "" && $alias != "" && $password != "" && ($level != "" && (intval($level) > 0) && (intval($level) < 5)))
						{
							//echo "Insert";
							$sql = 'INSERT INTO user (fname, lname, email, nickname, password, level) VALUES ("'.$fname.'", "'.$lname.'", "'.$email.'", "'.$alias.'", "'.$password.'", "'.$level.'")';
							require_once("../system/connection.php");
						    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
						    mysqli_close($dbc);
						    echo "Insersion Correcta";
						    header('Location: users.php?pe=5');
						}
						else
						{
							header('Location: adduser.php?pe=4');
						}
					}
				}
				?>
		</div>
		<div class="top">
			<div class="top-title">
				<img class="t-t-img" src="/Events/assets/events-beta.png">
				<div class="h1title">Add new user page</div>
			</div>
			<div></div>
			<div class="menu">
				<button onclick='window.location.href="/Events/modules/users/users.php"'>Back to Users</button>
				<!--h3><a href="php/adduser.php">Add User</a></h3-->
			</div>
		</div>
		<div class="container">
			
			<div class="content">
				<div class="content-big-card">
					<div></div>
					<div class="cbc-2">
						<form action="adduser.php?option=1" autocomplete="off" method="POST" class="cbc2-1">
							<input autocomplete="false" name="hidden" type="text" style="display:none;">
							<input type="text" placeholder="First Name" required name="fname" class="cbc21-1"/>
							<input type="text" placeholder="Last Name "required name="lname" class="cbc21-2"/>
							<input type="text" placeholder="Email " required name="email" class="cbc21-3"/>
							<input type="text" placeholder="Alias" required name="alias" class="cbc21-4"/>
							<input type="password" placeholder="Password " required name="pass" class="cbc21-4"/>
							<select name="level" class="cbc21-5"/>
								<option selected value="1">Access Level 1</option>
								<option value="2">Access Level 2</option>
								<option value="3">Access Level 3</option>
								<option value="4">Access Level 4</option>
							</select>
							<br>
							<button class='card-button' onlick="updateRequest('users', '<?php #echo $row[0]; ?>')" id="cbc21-6"> Create User </button>
						</form>
						<div class="cbc2-2">
							<img src="../../assets/events-beta-icon.png" class="big-img">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>