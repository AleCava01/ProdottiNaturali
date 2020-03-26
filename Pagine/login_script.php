<?php
include "DBsettings.php";
$username = $_POST["username"];
$password = $_POST["password"];

if(password_verify($password, mysqli_fetch_array($conn->query("SELECT password FROM Utente WHERE username LIKE '".$username."';"))["password"])){
    echo ("authorized");
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['id_u'] = mysqli_fetch_array($conn->query("SELECT id_u FROM Utente WHERE username LIKE '".$username."';"))["id_u"];
    exit;
}
else{
    echo("Non trovato");
    exit;
}
$conn->close();
?>