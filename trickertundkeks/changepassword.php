<?php

session_start();

$user = $_SESSION['username'];

if($user)
{
	echo "<a href='member.php'>Zurück</a> zum Mitgliederbereich<br>";
	if($_POST['submit'])
	{
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$repeatnewpassword = md5($_POST['repeatnewpassword']);

		//check passwort against db

		//db conect
		$connect = mysql_connect("localhost" ,"root", "") or die("couldnt connect");
		mysql_select_db("id1247461_phplogin");

		$queryget = mysql_query("SELECT password FROM users WHERE username='$user'") or die("query didnt work");
		$row = mysql_fetch_assoc($queryget);

		$oldpassworddb = $row['password'];

		//check passwort
		//echo "$oldpassworddb/$oldpassword";

		if($oldpassword==$oldpassworddb)
		{
			//check two new passwords
			if($newpassword==$repeatnewpassword)
			{
				$querychange = mysql_query("
				UPDATE users SET password='$newpassword' WHERE username='$user'
					");
				session_destroy();
				die("Passwort wurde geändert. <a href='login.php'>zum Login</a>");
			}
			else
			echo "Passwörter stimmen nicht überein >.>";
		}
		else
			echo "Das alte Passwort ist falsch...";
	}
	else
	{


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