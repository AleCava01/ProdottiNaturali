<html>
    <head>
        <title>Oli essenziali</title>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">



    </head>
<body>
<?php
include "navbar.php";
if(!isset($_SESSION['id_u'])){
  header("location: login.html");
  exit();
}
?>
<script>
  document.getElementById("location_indicator").innerHTML = "Sottocategorie";
</script>

<?php
include "DBsettings.php";
$conn->query("USE ".$db_name.";");
$categories = $conn -> query("SELECT DISTINCT sottocategoria.id_sc,sottocategoria.nome,sottocategoria.descrizione FROM sottocategoria, categoria WHERE sottocategoria.id_c=".$_GET["id_c"]);
$category = mysqli_fetch_assoc($categories);
echo("<table class='category_table'><tr>");
while($category){
  echo("<td>");
  echo("<a class='category_a' href='prodotti.php?id_sc=".$category["id_sc"]."'>");
  echo("<div class='category_div'>");
  echo("<p class='category_title'>".$category["nome"]."</p>");
  echo("<p class='category_description'>".$category["descrizione"]."</p>");
  echo("</div>");
  echo("</a>");
  echo("</td>");

  $category = mysqli_fetch_assoc($categories);

}
echo("</ul>");
echo("</div>");
echo("</div>");
?>    

</body>
</html>