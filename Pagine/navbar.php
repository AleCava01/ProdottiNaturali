<!--NAVBAR-->
<nav class="nav">
  <ul class="nav_ul"> 
    <li class="nav_li" style="float:left;"><a class="nav_a" style="width:100px; text-align:center;" href="order.php">Acquista</a>
      <ul class="dropdown_ul">
        <?php
          include 'DBsettings.php';
          $cart_items = $conn->query("SELECT c.quantita, c.importo_parziale, p.nome FROM carrello as c, formato as f, prodotto as p WHERE c.id_f = f.id_f AND f.id_p=p.id_p");
          $cart_item = mysqli_fetch_assoc($cart_items);
          while($cart_item){
            echo("<li class='dropdown_li'><table class='dropdown_table'><tr class='dropdown_tr'>");
            echo("<td class='dropdown_td'>".$cart_item["nome"]."</td>");
            echo("<td class='dropdown_td'>Quantità: ".$cart_item["quantita"]."</td>");
            echo("<td class='dropdown_td'>Totale: ".$cart_item["importo_parziale"]."</td>");
            echo("</tr></table></li>");
            $cart_item = mysqli_fetch_assoc($cart_items);
          }
        ?>
        </ul>
    </li>
    <li class="nav_li_profile" style="float:right">
      <?php
      session_start();
      echo("<a class='nav_profile_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
      ?>
      <a href="login.html" class="nav_exit_a" style="width:100px; text-align:center">Esci</a>
    </li>
    <li class="nav_li_locator" style="position:absolute; right: 50%;left: 50%;transform: translate(-50%,0%); width:150px; text-align:center;"><a id="location_indicator" class="nav_indicator"></a><a class="nav_homepage" href="homepage.php">Homepage</a></li>

  </ul>
</nav>
<!---->