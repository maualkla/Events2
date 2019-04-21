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
				?>
			</div>
			<div class="top">
				<h2>Users page</h2>
			</div>
			<div class="menu">
				<h3><a href="inicio.php">Back to Home</a></h3>
				<h3><a href="php/adduser.php">Add User</a></h3>
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