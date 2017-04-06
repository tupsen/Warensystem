<!doctype html>
<html>
	<head>	
	<link rel="stylesheet" href="../css/styles.css" />

	<a href="../uebersicht.php">Zurück zur Übersicht</a>

	<?php
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
		$query = "SELECT * FROM items WHERE id='$_GET[id]'";
		$result = mysqli_query($conn, $query);

		if ($result->num_rows > 0) 
		{
    	// output data of each row
    	while($row = $result->fetch_assoc())
    	 {
    	 	$id = $row['id'];
    	 	$marke = $row['Marke'];
    	 	$modell = $row['Modell'];
    	 	$bezeichnung = $row['Bezeichnung'];
    	 	$seriennummer = $row['Seriennummer'];
    	 	$beschreibung = $row['Beschreibung'];
    	 	$stk = $row['Stk'];
    	 	$gewicht = $row['Gewicht'];
    	 	$preis = $row['Preis'];
			$bildpfad = $row['Bildpfad'];
    	 }
		}
		?>






		<title>Detail</title>
	</head>
	<body vlink='blue'>
		<div id="bild">
			<?php 
				echo "<img src=../".$bildpfad." width='200' height='200'>";
			?>
		</div>
		<div id="info">
			<?php 
				echo $marke." ".$modell."<br>";
				echo "Seriennummer: ".$seriennummer."<br>";
				echo "Gewicht: ".$gewicht." kg<br>";
				echo "Stück auf Lager: " .$stk."<br>";
				echo "Preis: ".$preis." EUR<br>";
			?>
		</div>
		<div id="beschreibung">
			<?php 
				echo $beschreibung;
			?>
		</div>

	</body>





	



