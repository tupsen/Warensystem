<?php
	$connect = mysqli_connect("localhost", "root", "") or die("couldnt connect");
	mysqli_select_db($connect, 'id1247461_phplogin') or die("couldnt find db");

	if($_POST['anlegen'])
			{
					$neuMarke = ($_POST['in_marke']);
					$neuModell = ($_POST['in_modell']);
					$neuBezeichnung = ($_POST['in_bezeichnung']);
					$neuSeriennummer = ($_POST['in_seriennummer']);

					if(is_numeric(($_POST['in_stk'])))
					{$neuStk = ($_POST['in_stk']);}
					else
						{$neuStk = 0;}
					
					if(is_numeric(($_POST['in_gewicht'])))
					{$neuGewicht = ($_POST['in_gewicht']);}
					else
						{$$neuGewicht = 0;}

					if(is_numeric(($_POST['in_preis'])))
					{$neuPreis = ($_POST['in_preis']);}
					else
						{$neuPreis = 0;}
					
					$tMarke = str_replace(' ', '', $neuMarke);	
					$tModell = str_replace(' ', '', $neuModell);	
					$neubildpfad = "/bilder/$neuMarke $neuModell";
					$neubildpfad = str_replace(" ", "", $neubildpfad);
					$neubildpfad = strtolower($neubildpfad);

					$query = "
					INSERT INTO items (Marke, Modell, Bezeichnung, Seriennummer, Stk, Gewicht, Preis, Bildpfad) 
					VALUES ('$neuMarke','$neuModell','$neuBezeichnung','$neuSeriennummer','$neuStk','$neuGewicht','$neuPreis','$neubildpfad')";

					mysqli_query($connect, $query);

					header("refresh:0; url=uebersicht.php");
						
			}
			

	
?>