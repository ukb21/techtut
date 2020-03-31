<?php
  session_start();

  //unset($_SESSION["username"]);
$username = $_SESSION["employee_username"];
  $_SESSION = array();

  session_destroy();



  echo "<p>Goodbye, ".$username."</p>";
  echo "You have successfully logged out. Please <a href='uloginpage.php'>click here to login again</a>";

?>
