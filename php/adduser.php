<?php
/* AddUser PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 20th, 2019
	--> Description: Page focus in add new users
	--> Dependencies:   connection.php ( For the DB connection )
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Events / Users / Add User</title>
		<link rel="shortcut icon" href="../assets/events-beta-icon.png">
		<link rel=StyleSheet href= "../css/design.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="" id="error-msg">
			</div>
			<div class="" id="msg">
				<?php
					$fname = ""; $fname = $_REQUEST['fname'];
					$lname = ""; $lname = $_REQUEST['lname'];
					$email = ""; $email = $_REQUEST['email'];
					$alias = ""; $alias = $_REQUEST['alias'];
					$password = ""; $password = $_REQUEST['pass'];
					$password = password_hash($contra, PASSWORD_BCRYPT);
					if($fname != "" && $lname != "" && $email != "" && $alias != "" && $password != "")
					{
						echo "YEI";
					}
					else
					{
						echo " NO YEI ";
					}
 				?>
			</div>
			<div class="top">
				<h2>Add new user page</h2>
			</div>
			<div class="menu">
				<h3><a href="../users.php">Back to Users</a></h3>
				<!--h3><a href="php/adduser.php">Add User</a></h3-->
			</div>
			<div class="content">
				<form action="adduser.php" method="POST">
					<h4> First Name </h4>
					<input type="text" name="fname" />
					<h4> Last Name </h4>
					<input type="text" name="lname" />
					<h4> Email </h4>
					<input type="text" name="email" />
					<h4> Alias </h4>
					<input type="text" name="alias" />
					<h4> Password </h4>
					<input type="text" name="pass" />

					<input type="submit" name="submit" value="Create User">
				</form>
			</div>
		</div>
	</body>
</html>