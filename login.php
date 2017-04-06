<!DOTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="loginHeaderLoad">

	</div>
	<br>
	<div id="loginBox">
		<form action="process.php" method="POST">
			<p>
				<lable >Username: </lable>
				<input type="text" id="user" name="username" />
			</p>
			<p>
				<lable>Password: </lable>
				<input type="Password" id="password" name="password"   />
			</p>
			<p>
				<input type="submit" id="btnLogin" value="login" width="200" />
			</p>
		</form>
	</div>
</body>
</html>