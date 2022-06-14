document.getElementById("send").addEventListener("click", createUser);
document.getElementById("searchUser").addEventListener("click", readUser);
function createUser() {
	checkSuccefull();
	const email = document.getElementById("email").value;
	const name = document.getElementById("name").value;
	const phone = document.getElementById("phone").value;
	const password = document.getElementById("password").value;
	const checkEmail = email == "" || !isNaN(email);
	const checkName = name == "" || !isNaN(name);
	const checkPhone = phone == "" || isNaN(phone);
	const checkPassword = password == "" || !isNaN(password);
	if (checkEmail) {
		alert("El campo email no puede estar vacio ni ser un numero");
	}
	if (checkName) {
		alert("El campo name no puede estar vacio ni ser un numero");
	}
	if (checkPhone) {
		alert("El campo phone no puede estar vacio ni ser un texto");
	}
	if (checkPassword) {
		alert("El campo password no puede estar vacio ni ser un numero");
	}
	if (!checkEmail && !checkName && !checkPhone && !checkPassword) {
		$.ajax({
			url: "./ex-form.php",
			type: "POST",
			data: {
				action: "create",
				email: email,
				name: name,
				phone: phone,
				password: password,
			},
			// dataType: "json",
			success: function (response) {
				if (response == 0) {
					console.error(response);
					document.getElementById("createResult").innerHTML = "Error data";
				} else {
					document.getElementById("createResult").innerHTML = response;
				}
			},
			error: function (error) {
				document.getElementById("createResult").innerHTML = "ERROR: ";
				console.error(error);
			},
		});
	}
}
function checkSuccefull() {
	const email = document.getElementById("email").value;
	document.getElementById("succes_information").innerHTML = "";

	$.ajax({
		url: "./ex-form.php",
		type: "POST",
		data: {
			action: "succesfull",
			email: email,
		},
		// dataType: "json",
		success: function (response) {
			if (response == 0) {
				console.error(response);
				document.getElementById("succes_information").innerHTML = "Error data";
			} else {
				document.getElementById("succes_information").innerHTML = response;
			}
		},
		error: function (error) {
			document.getElementById("succes_information").innerHTML = "ERROR: ";
			console.error(error);
		},
	});
}
function readUser() {
	checkSuccefull();
	const email = document.getElementById("emailSearch").value;

	$.ajax({
		url: "./ex-form.php",
		type: "POST",
		data: {
			action: "readUser",
			email: email,
		},
		// dataType: "json",
		success: function (response) {
			if (response == 0) {
				console.error(response);
				document.getElementById("searchResult").innerHTML = "Error data";
			} else {
				response = JSON.parse(response);
				response = JSON.parse(response[0]);
				printResult("searchResult", response);
			}
		},
		error: function (error) {
			document.getElementById("searchResult").innerHTML = "ERROR: ";
			console.error(error);
		},
	});
}
document.getElementById("logUser").addEventListener("click", singIn);
function singIn() {
	checkSuccefull();
	const email = document.getElementById("emailSign").value;
	const password = document.getElementById("passwordSign").value;
	if (password == "" || !isNaN(password)) {
		alert("El campo password no puede estar vacio ni ser un numero");
	}
	if (email == "" || !isNaN(email)) {
		alert("El campo email no puede estar vacio ni ser un numero");
	}
	$.ajax({
		url: "./ex-form.php",
		type: "POST",
		data: {
			action: "singIn",
			email: email,
			password: password,
		},
		// dataType: "json",
		success: function (response) {
			if (response == 0) {
				console.error(response);
				document.getElementById("logResult").innerHTML = "Error data";
			} else {
				response = JSON.parse(response);
				response = JSON.parse(response[0]);
				printResult("logResult", response);
			}
		},
		error: function (error) {
			document.getElementById("logResult").innerHTML = "ERROR: ";
			console.error(error);
		},
	});
}
// function splitUser(response) {
// 	console.log(JSON.parse(response));
// 	console.log(JSON.parse(JSON.parse(response)[0]));
// 	// console.log(JSON.parse(response)[0]);
// 	// response = response.split('["')[1];
// 	// response = response.split('"]')[0];
// 	// response = response.replaceAll('\\"', '"');
// 	return JSON.parse(response);
// }
function printResult(id, response) {
	document.getElementById(id).innerHTML =
		"<b>ID: </b>" +
		response.id +
		"<br>" +
		"<b>EMAIL: </b>" +
		response.email +
		"<br>" +
		"<b>NOMBRE: </b>" +
		response.nombre +
		"<br>" +
		"<b>PHONE: </b>" +
		response.phone +
		"<br>" +
		"<b>PASSWORD: </b>" +
		response.password +
		"<br>";
}
