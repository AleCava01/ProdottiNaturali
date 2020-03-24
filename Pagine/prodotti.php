<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">
<link rel="stylesheet" type="text/css" href="CSS/products.css">


</head>
<body>
<!--NAVBAR-->
<ul class="nav_ul">
  <li class="nav_li"><img src="logo.png"></li>
  <li class="nav_li"><a class="nav_a" href="homepage.php">Prodotti Naturali</a></li>
  <li class="nav_li" style="float:right"><a class="nav_a" href="order.php">Carrello</a></li>
  <li style="float:right" class="nav_li">
    <?php
    session_start();
    echo("<a class='nav_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
    ?>
  </li>
</ul>
<!---->


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