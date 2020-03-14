<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "prodottiNaturali";
$conn = new mysqli($db_host, $db_user, $db_password);
if ($conn->connect_errno) {
  echo "Connection failed: ". $conn->connect_error . ".";
  exit();
}
$conn->query("USE ".$db_name.";");
?>
