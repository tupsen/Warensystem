<?php

	if($_POST['anlegen'])
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




					$neuMarke = ($_POST['in_marke']);
					$neuModell = ($_POST['in_modell']);
					$neuBezeichnung = ($_POST['in_bezeichnung']);
					$neuSeriennummer = ($_POST['in_seriennummer']);
					//$target = "bilder/".basename($_FILES['image']['name']);
					$uploaddir = 'bilder/';
					$uploaddir2 = '/bilder/';
					$neubildpfad = $uploaddir . basename($_FILES['file_up']['name']); 
					$neubildpfad2 = $uploaddir2 . basename($_FILES['file_up']['name']); 


					if(is_numeric(($_POST['in_stk'])))
					{$neuStk = ($_POST['in_stk']);}
					else
						{$neuStk = 0;}
					
					if(is_numeric(($_POST['in_gewicht'])))
					{$neuGewicht = ($_POST['in_gewicht']);}
					else
						{$neuGewicht = 0;}

					if(is_numeric(($_POST['in_preis'])))
					{$neuPreis = ($_POST['in_preis']);}
					else
						{$neuPreis = 0;}
					
					$tMarke = str_replace(' ', '', $neuMarke);	
					$tModell = str_replace(' ', '', $neuModell);	
				//	$neubildpfad = "/bilder/$neuMarke $neuModell";
				//	$neubildpfad = str_replace(" ", "", $neubildpfad);
				//	$neubildpfad = strtolower($neubildpfad);

					$query = "
					INSERT INTO items (Marke, Modell, Bezeichnung, Seriennummer, Stückzahl, Gewicht, Preis, Bildpfad) 
					VALUES ('$neuMarke','$neuModell','$neuBezeichnung','$neuSeriennummer','$neuStk','$neuGewicht','$neuPreis','$neubildpfad2')";
					mysqli_query($conn, $query);

					if(move_uploaded_file($_FILES['file_up']['tmp_name'], $neubildpfad))
					{
						echo "suxxess";
					}
					else
						echo "nooo";

					

					header("refresh:0; url=uebersicht.php");
						
			}
			

	
?>