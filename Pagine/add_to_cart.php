<?php
session_start();
if(!isset($_SESSION['id_u'])){
    header("location: login.html");
    exit();
}
include 'DBsettings.php';
$formato = $_GET["formato"];
$quantita = $_GET["quantita"];
if($quantita<=0 or $quantita>10){
    echo("<script>history.go(-1);</script>");
    exit();
}
$id_u = $_SESSION["id_u"];
$id_o = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_o FROM ordine WHERE stato=0 AND id_u=".$id_u))["id_o"];
$importo_parziale = mysqli_fetch_assoc(mysqli_query($conn, "SELECT prezzo FROM formato WHERE id_f = ".$formato))["prezzo"] * $quantita;
$quantita_gathered = mysqli_fetch_assoc(mysqli_query($conn, "SELECT quantita FROM carrello WHERE id_f=".$formato." AND id_o=".$id_o))["quantita"];
if(isset($quantita_gathered)){
    mysqli_query($conn, "UPDATE carrello SET quantita =".($quantita_gathered+$quantita).", importo_parziale=".mysqli_fetch_assoc(mysqli_query($conn, "SELECT prezzo FROM formato WHERE id_f = ".$formato))["prezzo"] * ($quantita_gathered+$quantita)." WHERE id_f=".$formato." AND id_o=".$id_o);
}
else{
    mysqli_query($conn, "INSERT INTO carrello VALUES(".$formato.",".$id_o.",".$quantita.",".$importo_parziale.")");
}
echo("<script>history.go(-1);</script>");
exit();
?>