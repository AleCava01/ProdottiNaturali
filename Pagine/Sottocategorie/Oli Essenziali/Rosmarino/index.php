<html>
<head>
<title>Oli essenziali al rosmarino</title>
<link rel="stylesheet" type="text/css" href="rosmarino.css">
<link rel="stylesheet" type="text/css" href="../../../CSS/navbar.css">


</head>
<body>
<!--NAVBAR-->
<ul class="nav_ul">
  <li class="nav_li"><img src="logo.png"></li>
  <li class="nav_li"><a class="nav_a" href="../../../homepage.php">Prodotti Naturali</a></li>
  <li class="nav_li" style="float:right"><a class="nav_a" href="../../order.php">Carrello</a></li>
  <li style="float:right" class="nav_li">
    <?php
    session_start();
    echo("<a class='nav_a' href='../../../profile.php'>Logged as: ".$_SESSION["username"]."</a>");
    ?>
  </li>
</ul>
<!---->

<h2>Oli essenziali al rosmarino</h2>


<?php
include "../../../DBsettings.php";
$products = $conn -> query("SELECT * FROM prodotto WHERE prodotto.id_sc = 1");
$product = mysqli_fetch_assoc($products);
echo("<table>");
while($product){
    echo("<tr>");
    echo("<td><img src='".$product["immagine"]."'/></td>");
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