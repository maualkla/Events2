<?php
/* Users PHP */
/* **********************************************************************************************
	--> Events in PHP
	--> Open Source proyect
	--> Autor: @maualkla
	--> Creation date: April 20th, 2019
	--> Last Edition: April 20th, 2019
	--> Description: Menu page for the users module
	--> Dependencies:   connection.php ( For the DB connection )
************************************************************************************************* */
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Events / Users</title>
		<link rel="shortcut icon" href="assets/events-beta-icon.png">
		<link rel=StyleSheet href= "css/design.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="" id="error-msg">
				<?php
					$param = ""; $param = $_REQUEST['param'];
					$display = false;
					if($param != "")
					{
						$sql = "SELECT * FROM user WHERE fname LIKE '%".$param."%' OR lname LIKE '%".$param."%' OR nickname LIKE '%".$param."%' OR userid LIKE '%".$param."%'";
						require_once("php/connection.php");
					    $result = mysqli_query($dbc,$sql) or die ("Error: " .mysqli_error($dbc));
					    mysqli_close($dbc);
					    $display = true;
					}
					else
					{
						// No seek
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
				<div class="content-table <?php if($display){echo'display';}else{echo 'hide';} ?>">
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
						        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td> <a href=''> CHANGEPASS </a> - <a href=''> EDIT </a> - <a href=''> DELETE </a> </tr>";
						    }
						?>
					</table>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var url = new URL(window.location.href);
	 		var param = url.searchParams.get("pe");
	 		if(param == 1)
	 		{
	 			//alert(" Error, check your password ");
	 			var text = document.getElementById("error-msg")
	 			text.innerHTML = "Insertion failed";
	 			text.classList.add("error");
	 		}
	 		else if(param == 2)
	 		{
	 			var text = document.getElementById("error-msg")
	 			text.innerHTML = "Sucesfull Insertion";
	 			text.classList.add("warning");
	 		}
		</script>
	</body>
</html>