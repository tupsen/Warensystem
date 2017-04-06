<?php
	$connect = mysqli_connect("localhost", "root", "") or die("couldnt connect");
	mysqli_select_db($connect, 'id1247461_phplogin') or die("couldnt find db");

	$query = "DELETE FROM items WHERE id='$_GET[id]'";

	if(mysqli_query($connect, $query))
		{header("refresh:0; url=uebersicht.php");}
	else
		echo "Not Deleted";
?>