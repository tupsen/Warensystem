<!doctype html>
<html>
	<head>
		<title>Uebersicht</title>
		<link rel="stylesheet" href="css/style.cs">	
		<?php
			session_start();
			$connect = mysql_connect("localhost", "root", "") or die("couldnt connect");
			mysql_select_db("id1247461_phplogin") or die("couldnt find db");
			$query = mysql_query("SELECT * FROM items");	
		if($_SESSION['username'])
{	
		

echo"

	<body vlink='blue'>
			<a href='member.php'>zurück</a>  zum Mitgliederbereich <br>
			<a href='logout.php'>Logout</a><br>
			<table border='1px'>
			<tr>
				<th>ID</th>
 				<th>Marke</th>
 				<th>Modell</th>
 				<th>Bezeichnung</th>
 				<th>SN</th>
 				<th>Stückzahl</th>
 				<th>Gewicht</th>
 				<th>Preis</th>
 				<th>Funktionen</th>
 			</tr>
 			<form action='addRecord.php' id='eintragAnlegen' method='POST'>
 			<tr>
 				<td></td>
				<td><input type='text' name='in_marke'></td>
				<td><input type='text' name='in_modell'></td>
				<td><input type='text' name='in_bezeichnung'></td>
				<td><input align='right' type='text' name='in_seriennummer'></td>
				<td><input align='right' type='text' name='in_stk'></td>
				<td><input align='right' type='text' name='in_gewicht'></td>
				<td><input align='right' type='text' name='in_preis'></td>
				<td><input type='submit' name='anlegen' value='anlegen'></td>

 			</tr>
 			</form>";

 	while($row = mysql_fetch_array($query))
	{
 		echo "
 			<tr id='Tabelleninhalt'>
 				<td>".$row['id']."</td>
 				<td>".$row['Marke']."</td> 
 				<td><a href=content/showDetails.php?id=".$row['id'].">".$row['Modell']."</a></td>	
 				<td>".$row['Bezeichnung']."</td> 
 				<td align='right'>".$row['Seriennummer']."</td>  					
 				<td align='right'>".$row['Stk']."</td> 
 				<td align='right'>".$row['Gewicht']."</td> 
 				<td align='right'>".$row['Preis']."</td> 
 				<td><a href=deleteRecord.php?id=".$row['id'].">Delete</a></td>
			</tr>";
	}
	


	echo"</table>
 		<script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
		<script src='js/general.js'></script>
		
 	</body>";
 }
else{
	echo "Du musst eingeloggt sein.<br>";
	echo "<a href='login.php'>Zum Login</a>";
	}
 	?>	
 	
</html>



