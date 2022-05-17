<!DOCTYPE html>
<!-- Main page -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Internal Server</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="includes/style.css">
	<style>
		.head {
			display: grid;
			justify-content: center;
		}
		.login{
			display: grid;
			justify-content: center;
			margin-top: 5vw;
		}
	</style>
</head>
<body>
<div class="head">
<h1>Internal Server</h1>
<?php require("includes/time.php");?>
</div>
<div class="login">
		<form action="../bin/login.php" method="POST">
			<input type="text" name="username" placeholder="Username">
			<br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<br>
			<input type="submit" value="Log in">
			<br>
			<br>
		</form>
	</div>
</body>
</html>
