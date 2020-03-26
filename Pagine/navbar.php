<!--NAVBAR-->
<nav class="nav">
  <ul class="nav_ul"> 
    <li class="nav_li" style="float:left;"><a class="nav_a" style="width:100px; text-align:center;" href="order.php">Carrello</a>
      <ul class="dropdown_ul">
        <?php
          session_start();
          include 'DBsettings.php';
          $cart_items = $conn->query("SELECT f.misura, f.id_f, o.id_o, f.capacita, c.quantita, c.importo_parziale, p.nome FROM carrello as c, formato as f, prodotto as p, ordine as o WHERE o.stato=0 AND c.id_f = f.id_f AND f.id_p=p.id_p AND c.id_o=o.id_o AND o.id_u=".$_SESSION['id_u']);
          $cart_item = mysqli_fetch_assoc($cart_items);
          echo("<li class='dropdown_li'><table class='dropdown_table'>");
          echo("<tr class='dropdown_tr'>");
          echo("<th class='dropdown_td' style='width:200px;'>Prodotto</th>");
          echo("<th class='dropdown_td'>Formato</th>");
          echo("<th class='dropdown_td'>Quantità</th>");
          echo("<th class='dropdown_td'>Importo</th>");
          echo("<th class='dropdown_td'>Elimina</th>");

          echo("<tr>");
          while($cart_item){
            echo("<tr class='dropdown_tr'>");
            echo("<td class='dropdown_td'><div style='width:200px;'>".$cart_item["nome"]."</div></td>");
            echo("<td class='dropdown_td'>".$cart_item["capacita"]." ".$cart_item["misura"]."</td>");
            echo("<td class='dropdown_td'>".$cart_item["quantita"]."</td>");
            echo("<td class='dropdown_td'><div style='width:100px;'>".$cart_item["importo_parziale"]." €</div></td>");
            echo("<td class='dropdown_td'><a href='remove_cart_item.php?id_o=".$cart_item["id_o"]."&id_f=".$cart_item["id_f"]."'><img style='width:10px; height:10px' src='Images/x_icon.png'</a></td>");
            echo("</tr>");
            $cart_item = mysqli_fetch_assoc($cart_items);
          }
          echo("</table></li>");
          echo("<li class='dropdown_li' style='width:98%;'><a class='checkout_a' href='order.php'><div class='checkout_div'>Checkout</div></a></li>");
        ?>
        </ul>
    </li>
    <li class="nav_li_profile" style="float:right">
      <?php
      echo("<a class='nav_profile_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
      ?>
      <a href="logout.php" class="nav_exit_a" style="width:100px; text-align:center">Esci</a>
    </li>
    <li class="nav_li_locator" style="position:absolute; right: 50%;left: 50%;transform: translate(-50%,0%); width:170px; text-align:center;"><a id="location_indicator" class="nav_indicator"></a><a class="nav_homepage" href="homepage.php">Homepage</a></li>
    <li class="nav_li_order_view" style="float:right;"><a class="nav_a" style="width:100px; text-align:center;" href="order_view.php">I tuoi ordini</a>

  </ul>
</nav>

<!---->