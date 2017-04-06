<?php

session_start();

	//get values passe from form in logn.php file
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username&&$password)
	{
		//db connet
		$connect = mysql_connect("localhost", "root", "") or die("couldnt connect");
		mysql_select_db("id1247461_phplogin") or die("couldnt find db");

		//anfrage ob username eingabe in db existiert
		$query = mysql_query("SELECT * FROM users WHERE username='$username'");

		//gibt anzahl einträge in denen username matches
		$numrows = mysql_num_rows($query);

		//wenn ein username matched
		if($numrows!=0)
		{
			//solange 
			while($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
			}

			//check to see if user und pw match
			if($username==$dbusername&&md5($password)==$dbpassword)
			{
				echo "<br>";
				echo "<div id='loginBox'></div><div id='loginContentInBox'>Login erfolgreich!<br><br> <a href='member.php'>Hier<a/><br>gelangst du in den Mitgliederbereich.";
				$_SESSION['username']=$username;
			}
			else
			{
				echo "<br>";
				echo "<div id='loginBox'></div><div id='loginContentInBox'>Falsche Benutzerdaten<br><br>";
				echo "<a href='login.php'>Zurück</a><br>zum Login</div>";
			}
		}
		else
		{
			echo "<br>";
			echo "<div id='loginBox'></div><div id='loginContentInBox'>Falsche Benutzerdaten<br><br>";
			echo "<a href='login.php'>Zurück</a><br>zum Login</div>";
		}

	}
	else
	{
		echo "<br>";
		echo "<div id='loginBox'></div><div id='loginContentInBox'>Keine Benutzerdaten eingegeben<br><br>";
		echo "<a href='login.php'>Zurück</a><br>zum Login</div>";
	}

	?>