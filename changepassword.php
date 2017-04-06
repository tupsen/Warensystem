<?php

session_start();

$user = $_SESSION['username'];

if($user)
{
	

	if($_POST['submit'])
	{
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$repeatnewpassword = md5($_POST['repeatnewpassword']);

		//check passwort against db

		//db conect
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

		$queryget = mysqli_query($conn, "SELECT password FROM users WHERE username='$user'") or die("query didnt work");
		$row = mysqli_fetch_assoc($queryget);

		$oldpassworddb = $row['password'];

		//check passwort
		//echo "$oldpassworddb/$oldpassword";

		if($oldpassword==$oldpassworddb)
		{
			//check two new passwords
			if($newpassword==$repeatnewpassword)
			{
				$querychange = mysqli_query($conn, "
				UPDATE users SET password='$newpassword' WHERE username='$user'
					");
				session_destroy();
				die("Passwort wurde geändert. <br><a href='login.php'>zum Login</a>");
			}
			else
			echo "Passwörter stimmen nicht überein >.>";
		}
		else
			echo "Das alte Passwort ist falsch...";
	}
	else
	{

		echo "<a href='member.php'>Zurück</a> zum Mitgliederbereich<br>";
		echo "
		<form action='changepassword.php' method='POST'>
		<Table>
		 <tr>
		 	<td>Altes Passwort:</td>
		 	<td><input type='text' name='oldpassword'></td>
		 </tr>
		 <tr>
			<td>Neues Passwort: </td>
			<td><input type='password' name='newpassword'></td>			
		 </tr>
		 <tr>
		 	<td>Erneut neues Passwort: </td>	
			<td><input type='password' name='repeatnewpassword'></td>
		 </tr>
		 <tr>
			<td><input type='submit' name='submit' value='change password'></td>			
		 </tr>
		</Table>
		</form>
		";
	}
}
else
{
	
	die("Du musst eingeloggt sein.");
}

?>