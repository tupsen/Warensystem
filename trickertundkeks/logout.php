<?php

session_start();

session_destroy();

echo "Erfolgreich ausgeloggt!  <br><a href='login.php'>zum Login</a>";

?>