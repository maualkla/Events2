/* Functions JS */

// Alertas : Se ejecuta al cargar el body
// V1 
function alerts()
{
	var url = new URL(window.location.href);
	var param = url.searchParams.get("pe");
	if(param == 1)
	{
		//alert(" Error, check your password ");
		var text = document.getElementById("error-msg")
		text.innerHTML = "Error, wrong user or password!";
		text.classList.add("error");
	}
	else if(param == 2)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "Sesion Closed";
		text.classList.add("warning");
	}
	else if(param == 3)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "Login first";
		text.classList.add("warning");
	}
	else if(param == 4)
	{
		//alert(" Error, check your password ");
		var text = document.getElementById("error-msg")
		text.innerHTML = "Insertion failed";
		text.classList.add("error");
	}
	else if(param == 5)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "User created";
		text.classList.add("warning");
	}
	else if(param == 6)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "User updated";
		text.classList.add("warning");
	}
	else if(param == 7)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "User deleted";
		text.classList.add("warning");
	}
	else if(param == 8)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "Password incorrect";
		text.classList.add("error");
	}
	else if(param == 9)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "Passwords don't match";
		text.classList.add("error");
	}
	else if(param == 10)
	{
		var text = document.getElementById("error-msg")
		text.innerHTML = "Password updated";
		text.classList.add("warning");
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