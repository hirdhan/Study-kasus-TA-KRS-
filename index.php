<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<script src="page/js/bootstrap.js" type="text/javascript"></script>
	<link href="page/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
	<title>login</title>

<style>

.bg_login {
	min-height: 100%;
    min-width: 1024px;
    width: 100%;
    height: auto;
    position: fixed;
    top: 0;
    left: 0;
	
}

.logo {
	font-size: 20px;
	text-align: center;
	text-decoration: bold;
}

body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}

.box {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	padding: 40px;
	background: rgba(255,255,255,.8);
	box-sizing: border-box;
	box-shadow: 1px 0px 2px 4px #4682B4;
	border-radius: 10px;
}

.box h2 {
	margin: 0 0 30px;
	padding: 0;
	color: #000000;
	text-align: center;
}

.box .inputBox {
	position: relative;
}

.box .inputBox input {
	width: 100%;
	padding: 10px 0;
	font-size: 14px;
	color: #000000;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #000000;
	outline: none;
	background: transparent;
}

.box .inputBox label {
	position: absolute;
	top: 0;
	left: 0;
	letter-spacing: 1px;
	padding: 10px 0;
	font-size: 14px;
	color: #000000;
	pointer-events: none;
	transition: .5s;
}

.box .inputBox input:focus ~ label, .box .inputBox input:valid ~ label {
	top: -18px;
	left: 0;
	color: #03a9f4;
	font-size: 12px;
}

.box input[type="submit"] {
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: #03a9f4;
	padding: 10px 20px;
	cursor: pointer;
	border-radius: 5px;
	margin-right: 200px;
	margin-top: 15px;
	font-size: 18px;
}

@media (max-width: 768px) {
	.box {
		width: 350px;
	}
}
</style>
</head>
<body>
	<!-- <img class="bg_login" src="bg_login.jpg"/> -->
	<div class="box">
		<div class="logo">SIM AKADEMIK | KRS</div><br>
		<form action="login.php" method="POST">
			<div class="inputBox">
			<input type="text" name="username" autocomplete="off" required="">
			<label>Nip / Npm</label>
			</div>
			<div class="inputBox">
			<input type="password" name="password" required="">
			<label>Password</label>
			</div>
			<input type="submit" name="login" value="Masuk">
		</form>
	</div>
</body>
</html>