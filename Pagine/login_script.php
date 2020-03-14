<?php
include "DBsettings.php";
$username = $_POST["username"];
$password = $_POST["password"];

if(password_verify($password, mysqli_fetch_array($conn->query("SELECT password FROM Utente WHERE username LIKE '".$username."';"))["password"])){
    define('auth', TRUE);
    require("homepage.php");
    exit;
}
else{
    echo "<script> alert('Email or password not correct'); </script>";
    echo "<script> location.href='login.html'; </script>";
    exit;
}
$conn->close();
?>