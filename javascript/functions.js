/* Functions JS */

// Alertas : Se ejecuta al cargar el body
// V1 
function alerts()
{
	console.log( " Hey im in alert ");
	var url = new URL(window.location.href);
	var param = url.searchParams.get("pe");
	var text = "";
	var war = "";
	var show = false;

	// New version
	switch (param)
	{
		case '1': 
			text = 'Error, wrong user or password!'; war = 'er'; show = true;
			break;
		case '2': 
			text = 'Sesion Closed!'; war = 'wr'; show = true;
			break;
		case '3': 
			text = 'Login first!'; war = 'wr'; show = true;
			break;
		case '4': 
			text = 'Isertion failed!'; war = 'er'; show = true;
			break;
		case '5': 
			//console.log( " Entro a 5");
			text = 'User created!'; war = 'wr'; show = true;
			break;
		case '6': 
			text = 'User updated!'; war = 'wr'; show = true;
			break;
		case '7': 
			text = 'User deleted!'; war = 'wr'; show = true;
			break;
		case '8': 
			text = 'Password Incorrect!'; war = 'er'; show = true;
			break;
		case '9': 
			text = 'Passwords don´t match!'; war = 'er'; show = true;
			break;
		case '10': 
			text = 'Password updated!'; war = 'wr'; show = true;
			break;
		default :
			//console.log("nada");
			break;
	}

	if(show)
	{
		var msg = document.getElementById("error-msg")
		msg.innerHTML = text;
		msg.classList.add(war);
	}
}

function confirmDelete(param)
{
	var x = confirm("Delete this user?");
	if(x)
	{
		window.location.href = 'users.php?option=2&param=' + param;
	}
	else
	{
		//nothing
	}
}

function goToEdit(param)
{
	window.location.href="users.php?option=1&param=" + param;
}

function resetPage()
{
	window.location.href = 'users.php';
}

function changePass(param)
{
	var x = prompt("Type your password", "");
	if(x)
	{
		var y = btoa(x);
		window.location.href = 'users.php?option=4&param=' + param + '&ps=' + y;
	}
}