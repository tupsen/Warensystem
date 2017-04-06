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
		echo "<div id='memberHeaderBox'></div>";
		echo "<div id='memberBox'></div>";

		echo "<div id='memberHeaderContentInBox'>";
		echo "<div class='memberLinkinHeader'><a id='link_uebersicht' href='uebersicht.php'>Warenübersicht</a></div>";
		echo "<div class='memberLinkinHeader'><a id='link_logout'  href='logout.php'>Logout</a></div>";
		echo "<div class='memberLinkinHeader'><a id='link_changepassword'  href='changepassword.php'>Passwort ändern</a></div>
			</div>";

		echo "<div id='memberContentInBox'><br>Willkommen, ".$_SESSION['username']."!</div>";
	}

	else
		die("du musst eingeloggt sein!");


?>
<script src="js/general.js"></script>

</body>
<footer></footer>