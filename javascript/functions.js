/* Functions JS */

// Alertas : Se ejecuta al cargar el body
// V1 
function alerts()
{
	//console.log( " Hey im in alert ");
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
			text = 'Insertion failed!'; war = 'er'; show = true;
			break;
		case '5': 
			//console.log( " Entro a 5");
			text = 'User created!'; war = 'ss'; show = true;
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
			text = 'Passwords do not match!'; war = 'er'; show = true;
			break;
		case '10': 
			text = 'Password updated!'; war = 'wr'; show = true;
			break;
		case '11':
			text = 'Error try again'; war = 'er'; show = true;
			break;
		case '12':
			text = 'Event updated'; war = 'wr'; show = true;
			break;
		case '13':
			text = 'Event Created'; war = 'ss'; show = true;
			break;
		case '14':
			text = 'Event Deleted!'; war = 'wr'; show = true;
			break;

		default :
			//console.log("nada");
			break;
	}

	if(show)
	{
		var msg = document.getElementById("error-msg");
		msg.innerHTML = text;
		msg.classList.add(war);
		msg.addEventListener("click", function(){
			var msg = document.getElementById("error-msg");
			msg.innerHTML = null;
			msg.classList.remove("er");
			msg.classList.remove("wr");
			msg.classList.remove("ss");
		});
	}
	//other functions
	noBackButton();
}

document.oncontextmenu = function()
{
    return false;
}

function noBackButton()
{
	window.location.hash="nbb";
	window.location.hash="anbb" //chrome
	window.onhashchange=function()
	{
		window.location.hash="nbb";
	}
}

function confirmDelete(param, page, num)
{
	var x = confirm("Confirm delete?");
	if(x)
	{
		window.location.href = page + '.php?option=' + num + '&param=' + param;
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

function resetPage(direc, param, option)
{
	window.location.href = direc + '.php?option=' + option + '&param=' + param;
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


/*****
 * Demo Ajax
 * To update a User in User Main
 *
 ******/
 function updateRequest(direc, user)
 {
 	/* GET VALUES */
 	var data = [];
 	for(let x = 1; x < 7; x++)
 	{
 		data[x - 1] = document.getElementById('edit_' + x).value;
 	}
 	window.console.log(data);
 	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			window.console.log(" Orale ");
		}
	};
	xhttp.open("PUT", direc + ".php?option=3", true);
	xhttp.send(data);
 }

 function clic()
{
	var url_1 = "https://bbmkt.herokuapp.com/v1/adduser"
	var vl = document.getElementById("valores");
	console.log(" Entro en JS"); vl.innerHTML += "<br> ========> Ejecutando llamada <br>";
	var req = new XMLHttpRequest();console.log(" Creo xml"); vl.innerHTML += "========> Se ha creado el archivo XMLHttpRequest <br>";
	req.open("GET", url_1, true);console.log(" .open"); vl.innerHTML += "========> Se ha definido la URL y el metodo GET <br>";
	req.send();console.log(" .send"); vl.innerHTML += "========> Se ha hecho la peticion a la URL: "+ url_1+" <br>";
	if(req.response)
	{
		vl.innerHTML += "========> La respuesta es: <br>"+ req.response +"<br>";
	}
	else
	{
		vl.innerHTML += "========> No hay respuesta <br>";
	}
	
	/*fetch('https://localhost:3000/v1/adduser');
	.then(response => response.json());
	.then(json => console.log(json));*/
}