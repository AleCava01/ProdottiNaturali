<?php
include "DBsettings.php";
$username = $_POST["username"];
$password = $_POST["password"];

if(password_verify($password, mysqli_fetch_array($conn->query("SELECT password FROM Utente WHERE username LIKE '".$username."';"))["password"])){
    echo ("authorized");
    exit;
}
else{
    echo("Non trovato");
    exit;
}
$conn->close();
?>