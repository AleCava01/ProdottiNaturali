<?php
session_start();
$id_u = $_SESSION["id_u"];
include 'DBsettings.php';
if(mysqli_fetch_assoc($conn->query("SELECT f.id_f, o.id_o, f.capacita, c.quantita, c.importo_parziale, p.nome FROM carrello as c, formato as f, prodotto as p, ordine as o WHERE o.stato=0 AND c.id_f = f.id_f AND f.id_p=p.id_p AND c.id_o=o.id_o AND o.id_u=".$id_u))["id_f"]==""){
    exit();
}
$id_o = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_o FROM ordine WHERE stato=0 AND id_u=".$id_u))["id_o"];
$via = $_POST["via"];
$civico = $_POST["civico"];
$CAP = $_POST["CAP"];
$citta = $_POST["citta"];
$provincia = $_POST["provincia"];
$pagamento = $_POST["pagamento"];
$spedizione = $_POST["spedizione"];
$date = date("Y,m,d h:i:s");
$importo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(importo_parziale) as tot FROM carrello WHERE id_o=".$id_o))["tot"];
$sql = "UPDATE ordine SET data='".$date."',via='".$via."',civico=".$civico.",cap=".$CAP.",citta='".$citta."',provincia='".$provincia."',pagamento=".$pagamento.",stato=1,spedizione=".$spedizione.",importo=".$importo." WHERE id_o=".$id_o;
mysqli_query($conn, $sql);
mysqli_query($conn, "INSERT INTO ordine(stato, id_u) VALUES (0,".$id_u.")");
echo("ordine effettuato con successo");
?>
