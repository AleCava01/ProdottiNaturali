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
//verifica esistenza profilo
if(strtoupper(mysqli_fetch_array(mysqli_query($conn,"SELECT username FROM utente WHERE username like '".$username."';"))[0])==strtoupper($username)){
    echo("utente già registrato");
    exit();
}
if(strtoupper(mysqli_fetch_array(mysqli_query($conn,"SELECT email FROM utente WHERE email like '".$email."';"))[0])==strtoupper($email)){
    echo("utente già registrato");
    exit();
}
//inserimento nel database
$sql = "INSERT INTO utente(username,password,email,nome,cognome,via,civico,cap,citta,provincia) VALUES ('".$username."','".$password."','".$email."','".$nome."','".$cognome."','".$via."',".$civico.",".$CAP.",'".$citta."','".$provincia."')";
$result = mysqli_query($conn, $sql);
if($result != "1"){
    echo("Si è verificato un errore durante l'inserimento, si prega di contattare l'assistenza");
}
else{
    echo("success");
    mysqli_query($conn, "INSERT INTO ordine(stato, id_u) VALUES (0,".mysqli_fetch_assoc(mysqli_query($conn,"SELECT id_u FROM utente WHERE Username LIKE '".$username."'"))["id_u"].")");
    session_start();
    $_SESSION['username'] = $username;
}
?>