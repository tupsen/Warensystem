<!doctype html>
<html>
	<head>
		<title>Uebersicht</title>
		<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function(){
    		$('#datatable').DataTable();
		})</script>

		<?php
			session_start();
			
		if($_SESSION['username'])
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
		$query = mysqli_query($conn, "SELECT * FROM items");	

echo"

	<body vlink='blue'>
			<a href='member.php'>zurück</a>  zum Mitgliederbereich <br>
			<a href='logout.php'>Logout</a><br><br><br>
			<table id='datatable' border='1px'>
			<thead>
			<tr>
				<th>ID</th>
 				<th>Marke</th>
 				<th>Modell</th>
 				<th>Bezeichnung</th>
 				<th>SN</th>
 				<th>Stückzahl</th>
 				<th>Gewicht</th>
 				<th>Preis</th>
 				<th>Bild</th>
 				<th>Funktionen</th>
 			</tr>
 			</thead>

 			<tbody>";

 	while($row = mysqli_fetch_array($query))
	{
 		echo "
 			<tr id='Tabelleninhalt'>
 				<td>".$row['id']."</td>
 				<td>".$row['Marke']."</td> 
 				<td><a href=content/showDetails.php?id=".$row['id'].">".$row['Modell']."</a></td>	
 				<td>".$row['Bezeichnung']."</td> 
 				<td align='right'>".$row['Seriennummer']."</td>  					
 				<td align='right'>".$row['Stückzahl']."</td> 
 				<td align='right'>".$row['Gewicht']."</td> 
 				<td align='right'>".$row['Preis']."</td> 
 				<td></td>
 				<td><a href=deleteRecord.php?id=".$row['id'].">Delete</a></td>
			</tr>";
	}
	
echo "</tbody>
 			<form action='addRecord.php' id='eintragAnlegen' method='POST' enctype='multipart/form-data'>
 			<tr>
 				<td></td>
				<td><input type='text' name='in_marke'></td>
				<td><input type='text' name='in_modell'></td>
				<td><input type='text' name='in_bezeichnung'></td>
				<td><input align='right' type='text' name='in_seriennummer'></td>
				<td><input align='right' type='text' name='in_stk'></td>
				<td><input align='right' type='text' name='in_gewicht'></td>
				<td><input align='right' type='text' name='in_preis'></td>
				<td><input type='file' name='file_up'></td>
				<td><input type='submit' name='anlegen' value='anlegen'></td>

 			</tr>
 			</form>";


	echo"</table>

		
 	</body>";
 }
else{
	echo "Du musst eingeloggt sein.<br>";
	echo "<a href='login.php'>Zum Login</a>";
	}
 	?>	
 	
</html>



