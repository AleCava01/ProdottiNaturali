<html>
    <head>
        <title>Homepage</title>
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
  document.getElementById("location_indicator").innerHTML = "Categorie";
</script>
<?php
include 'DBsettings.php';
$categories = $conn -> query("SELECT * FROM categoria");
$category = mysqli_fetch_assoc($categories);
echo("<table class='category_table'><tr>");
while($category){
  echo("<td>");
  echo("<a class='category_a' href='sottocategoria.php?id_c=".$category["id_c"]."'>");
  echo("<div class='category_div'>");
  echo("<p class='category_title'>".$category["nome"]."</p>");
  echo("<p class='category_description'>".$category["descrizione"]."</p>");
  echo("</div>");
  echo("</a>");
  echo("</td>");

  $category = mysqli_fetch_assoc($categories);

}
echo("</tr></table>");
?>    

</body>
</html>