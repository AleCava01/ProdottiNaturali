<?php
include "DBsettings.php";
session_start();
if(!isset($_SESSION['id_u'])){
    header("location: login.html");
    exit();
}
$id_o = $_GET["id_o"];
$id_f = $_GET["id_f"];
mysqli_query($conn,"DELETE FROM carrello WHERE id_o=".$id_o." AND id_f=".$id_f);
echo("<script>history.go(-1);</script>");
exit();
?>