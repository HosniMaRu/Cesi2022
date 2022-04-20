<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Profe">
	<title></title>
	<link rel="stylesheet" href="../../menu\menu.css" />
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="main">
		<form method="get" action=".\save.php" target="_blank">
			<div class="center">
				<label for="fname">Name:</label>
				<input type="text" name="fname" placeholder="Your name.." class="input_text">
			</div>
			<div class="center">
				<label for="email">Email:</label>
				<input type="email" name="email" class="input_text">
			</div>
			<div class="center">
				<label for="password">Password:</label>
				<input type="password" name="pass" class="input_text">
			</div>
			<div class="center">
				<label class="inline" for="register_login">Login</label>
				<input type="radio" name="register_login" value="login" id="login">
				<label class="inline" for="register_login">Register</label>
				<input type="radio" name="register_login" value="register" id="register">
			</div>
			<div class="center">
				<input type="submit">
			</div>
		</form>
	</div>
	<?php
	$name = '';
	$email = '';
	$pass = '';
	$register_login = '';
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (!empty($_GET['fname'])) {
			$name = $_GET['fname'];
		}
		if (!empty($_GET['email'])) {
			$email = $_GET['email'];
		}
		if (!empty($_GET['pass'])) {
			$pass = $_GET['pass'];
		}
		if (!empty($_GET['pass'])) {
			$pass = $_GET['pass'];
		}
		if (!empty($_GET['register_login'])) {
			$register_login = $_GET['register_login'];
		}
	}
	?>
</body>

</html>