<html>
	<title>Mitgliederbereich</title>
	<link rel="stylesheet" href="css/style.cs">
</html>
<body vlink='blue'>
<?php

	session_start();
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";

	if($_SESSION['username'])
	{

		echo "<div><a href='uebersicht.php'>Warenübersicht</a></div>";
		echo "<div><a href='logout.php'>Logout</a></div>";
		echo "<div><a href='changepassword.php'>Passwort ändern</a></div>";

		echo "<br><br>Willkommen, ".$_SESSION['username']."!</div>";
	}

	else
		die("du musst eingeloggt sein!");


?>
<script src="js/general.js"></script>

</body>
<footer></footer>