<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
<body>

<?php
include 'DBsettings.php';
$categories = $conn -> query("SELECT nome,descrizione FROM categoria");
$category = mysqli_fetch_assoc($categories);
echo("<div class='category_wrap'>");
echo("<div class='category_div'>");
echo("<ul class='category_ul'>");
while($category){
    echo("<li class='category_li'>");
    echo("<a class='category_a' href='".$category["nome"]."/index.php'>");
    echo("<p class='category_title'>".$category["nome"]."</p>");
    echo("<p class='category_description'>".$category["descrizione"]."</p>");
    echo("</a>");
    echo("</li>");
    $category = mysqli_fetch_assoc($categories);
}
echo("</ul>");
echo("</div>");
echo("</div>");
?>    

</body>
</html>