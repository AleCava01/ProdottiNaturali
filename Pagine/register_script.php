<?php
include "DBsettings.php";

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$via = $_POST["via"];
$civico = $_POST["civico"];
$CAP = $_POST["CAP"];
$citta = $_POST["citta"];
$provincia = $_POST["provincia"];

//crittografia della password
$password = password_hash($password, PASSWORD_DEFAULT);

//inserimento nel database
$sql = "INSERT INTO utente(username,password,email,nome,cognome,via,civico,cap,citta,provincia) VALUES ('".$username."','".$password."','".$email."','".$nome."','".$cognome."','".$via."',".$civico.",".$CAP.",'".$citta."','".$provincia."')";
$result = mysqli_query($conn, $sql);
if($result != "1"){
    echo("Si è verificato un errore durante l'inserimento, si prega di contattare l'assistenza");
}
else{
    echo("success");
}
?>