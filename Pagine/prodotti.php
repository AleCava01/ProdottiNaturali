<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">
<link rel="stylesheet" type="text/css" href="CSS/products.css">


</head>
<body>
<div class="content_div">
<?php
include "navbar.php";
if(!isset($_SESSION['id_u'])){
  header("location: login.html");
  exit();
}
?>
<script>
  document.getElementById("location_indicator").innerHTML = "Prodotti";
</script>

<?php
include "DBsettings.php";
$products = $conn -> query("SELECT * FROM prodotto WHERE prodotto.id_sc = ".$_GET["id_sc"]);
$product = mysqli_fetch_assoc($products);
$cat = mysqli_fetch_assoc($conn -> query("SELECT nome FROM sottocategoria WHERE id_sc=".$_GET["id_sc"]))["nome"];
echo("<script>document.getElementById('location_indicator').innerHTML='".$cat."';</script>");
echo("<table class='product_table'>");
echo("<tr class='product_tr'>");
echo("<th class='product_th'>Immagine</th>");
echo("<th class='product_th'>Nome</th>");
echo("<th class='product_th'>Descrizione</th>");
echo("<th class='product_th'>Istruzioni</th>");
echo("<th class='product_th'>Formato</th>");
echo("<th class='product_th'>Quantità</th>");
echo("<th class='product_th'>Aggiungi</th>");
echo("</tr>");
while($product){
    echo("<tr class='product_tr'>");
    echo("<td class='product_td'><img style='width:150px;height:150px;' src='Images/Prodotti/".$product["immagine"]."'/></td>");
    echo("<td class='product_td'>".$product["nome"]."</td>");
    echo("<td class='product_td'>".$product["descrizione"]."</td>");
    echo("<td class='product_td'>".$product["istruzioni"]."</td>");
    echo("<td class='product_td'><select class='product_select' id='formato_selection_".$product["id_p"]."'>");
    $formati = $conn -> query("SELECT * FROM formato WHERE formato.id_p = ".$product['id_p'].";");
    $formato = mysqli_fetch_assoc($formati);
    while($formato){
      echo("<option class='product_option' value='".$formato["id_f"]."'>".$formato["capacita"]." ".$formato["misura"]."</option>");
      $formato = mysqli_fetch_assoc($formati);
    }
    echo("</select></td>");
    echo("<td class='product_td'><input class='product_input' id='quantita_input_".$product["id_p"]."' type='number' value='1' min='1' max='10'/></td>");
    echo("<td class='product_td'>
      <script>function add_".$product["id_p"]."(){
          var qta= document.getElementById('quantita_input_".$product["id_p"]."').value;
          location.href='add_to_cart.php?formato='+document.getElementById('formato_selection_".$product["id_p"]."').value+'&quantita='+qta;
        }
      </script>");
    echo("<button class='product_button' onclick='add_".$product["id_p"]."()'><img width=35px height=35px src='Images/carrello.png'></button></td>");
    echo("</tr>");
    $product = mysqli_fetch_assoc($products);
}
echo("</table>");
?> 
</div>
</body>
</html>