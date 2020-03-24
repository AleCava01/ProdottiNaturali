<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">
<link rel="stylesheet" type="text/css" href="CSS/products.css">


</head>
<body>
<?php
include "navbar.php";
?>
<script>
  document.getElementById("location_indicator").innerHTML = "Prodotti";
</script>

<?php
include "DBsettings.php";
$products = $conn -> query("SELECT * FROM prodotto WHERE prodotto.id_sc = ".$_GET["id_sc"]);
$product = mysqli_fetch_assoc($products);
echo("<table>");
echo("<tr>");
echo("<th></th>");
echo("<th>NOME</th>");
echo("<th>DESCRIZIONE</th>");
echo("<th>ISTRUZIONI</th>");
echo("</tr>");
while($product){
    echo("<tr>");
    echo("<td><img style='width:150px;height:150px;' src='Images/Prodotti/".$product["immagine"]."'/></td>");
    echo("<td>".$product["nome"]."</td>");
    echo("<td>".$product["descrizione"]."</td>");
    echo("<td>".$product["istruzioni"]."</td>");
    echo("</tr>");

    $product = mysqli_fetch_assoc($products);
}
echo("</table>");
?> 
</body>
</html>