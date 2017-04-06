<?php
	//get values passe from form in logn.php file
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username&&$password)
	{
		$dbservername="localhost";
		$dbusername="u944105699_user";
		$dbpassword="tupsen";
		//db connet
		$conn = new mysqli($dbservername, $dbusername, $dbpassword);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";

		mysqli_select_db($conn, "u944105699_db") or die("couldnt find db");

		//anfrage ob username eingabe in db existiert
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		
		//gibt anzahl einträge in denen username matches
		$numrows = mysqli_num_rows($query);

		session_start();
		


		//wenn ein username matched
		if($numrows!=0)
		{
			//solange 
			while($row = mysqli_fetch_assoc($query))
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