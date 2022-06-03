document.getElementById("send").addEventListener("click", () => {
	$.ajax({
		url: "./ex-form.php",
		type: "POST",
		data: {
			email: document.getElementById("email").value,
			name: document.getElementById("name").value,
			phone: document.getElementById("phone").value,
		},
		// dataType: "json",
		success: function (response) {
			if (response == 0) {
				console.log(response);
				document.getElementById("result").innerHTML = "Error data";
			} else {
				document.getElementById("result").innerHTML = response;
			}
		},
		error: function (error) {
			document.getElementById("result").innerHTML = "ERROR: ";
			console.log("ERROR: ");
			console.log(error);
		},
	});
});
