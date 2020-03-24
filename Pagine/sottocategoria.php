<html>
    <head>
        <title>Oli essenziali</title>
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
$conn->query("USE ".$db_name.";");
$categories = $conn -> query("SELECT DISTINCT sottocategoria.id_sc,sottocategoria.nome,sottocategoria.descrizione FROM sottocategoria, categoria WHERE sottocategoria.id_c=".$_GET["id_c"]);
$category = mysqli_fetch_assoc($categories);
echo("<div class='category_wrap'>");
echo("<div class='category_div'>");
echo("<ul class='category_ul'>");
while($category){
    echo("<li class='category_li'>");
    echo("<span class='category_span'>");
    echo("<a class='category_a' href='prodotti.php?id_sc=".$category["id_sc"]."'>");
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