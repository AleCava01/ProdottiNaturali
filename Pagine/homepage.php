<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">

    </head>
<body>

<!--NAVBAR-->
<ul class="nav_ul">
  <li class="nav_li"><img src="logo.png"></li>
  <li class="nav_li"><a class="nav_a" href="homepage.php">Prodotti Naturali</a></li>
  <li class="nav_li" style="float:right"><a class="nav_a" href="order.php">Carrello</a></li>
    <ul>
      <?php
        include 'DBsettings.php';
        $cart_items = $conn->query("SELECT * FROM carrello");
        $cart_item = mysqli_fetch_assoc($cart_items);
        while($cart_item){
          echo("<li ><table><tr>");
          echo("<td>".$cart_item["id_f"]."</td>");
          echo("<td>".$cart_item["quantita"]."</td>");
          echo("<td>".$cart_item["importo_parziale"]."</td>");
          echo("</tr></table></li>");
          $cart_item = mysqli_fetch_assoc($cart_items);
        }
      ?>
    </ul>
  <li style="float:right" class="nav_li">
    <?php
    session_start();
    echo("<a class='nav_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
    ?>
  </li>
</ul>
<!---->

<?php
include 'DBsettings.php';
$categories = $conn -> query("SELECT * FROM categoria");
$category = mysqli_fetch_assoc($categories);
echo("<div class='category_wrap'>");
echo("<div class='category_div'>");
echo("<ul class='category_ul'>");
while($category){
    echo("<li class='category_li'>");
    echo("<span class='category_span'>");
    echo("<a class='category_a' href='sottocategoria.php?id_c=".$category["id_c"]."'>");
    echo("<p class='category_title'>".$category["nome"]."</p>");
    echo("<p class='category_description'>".$category["descrizione"]."</p>");
    echo("</a>");
    echo("</span>");
    echo("</li>");
    $category = mysqli_fetch_assoc($categories);
}
echo("</ul>");
echo("</div>");
echo("</div>");
?>    

</body>
</html>