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
					$queryDelete = "SELECT Bildpfad FROM items WHERE id='$_GET[id]'";
					$queryDelete = mysqli_query($conn, $queryDelete);
					$row = mysqli_fetch_assoc($queryDelete);
					$toDelete = $row['Bildpfad'];
					$toDelete = substr($toDelete, 1);

					if(file_exists($toDelete))
					{
						unlink($toDelete);
					}
					else
					{
						echo $toDelete;
					}

	$query = "DELETE FROM items WHERE id='$_GET[id]'";

	if(mysqli_query($conn, $query))
	{}
		{header("refresh:0; url=uebersicht.php");}
	else
		echo "Not Deleted";
?>