<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/order.css">
<link rel="icon" href="Images/favicon.ico"/>

</head>
<body>
        <?php
            include "DBsettings.php";
            session_start();
            $id_o = $_GET["id_o"];
            $cart_items = $conn->query("SELECT f.misura, p.immagine, f.id_f, o.id_o, f.capacita, c.quantita, c.importo_parziale, p.nome FROM carrello as c, formato as f, prodotto as p, ordine as o WHERE c.id_o = o.id_o AND c.id_o=".$id_o." AND c.id_f = f.id_f AND f.id_p=p.id_p AND o.id_u=".$_SESSION['id_u']);
            $cart_item = mysqli_fetch_assoc($cart_items);
            echo("<table class='summary_table' style='background-color:white'>");
            echo("<tr class='summary_tr'>");
            echo("<th class='summary_td'>Immagine</th>");
            echo("<th class='summary_td'>Prodotto</th>");
            echo("<th class='summary_td'>Formato</th>");
            echo("<th class='summary_td'>Quantità</th>");
            echo("<th class='summary_td'>Importo</th>");
            echo("<tr>");
            while($cart_item){
                echo("<tr class='summary_tr'>");
                echo("<td class='summary_td' style='width:130px;'><img style='width:130px; height:130px;' src='Images/Prodotti/".$cart_item["immagine"]."'></td>");
                echo("<td class='summary_td'>".$cart_item["nome"]."</td>");
                echo("<td class='summary_td'>".$cart_item["capacita"]." ".$cart_item["misura"]."</td>");
                echo("<td class='summary_td'>".$cart_item["quantita"]."</td>");
                echo("<td class='summary_td'>".$cart_item["importo_parziale"]." €</td>");
                echo("</tr>");
                $cart_item = mysqli_fetch_assoc($cart_items);
            }
            echo("</table>");
            
          ?>
        </div>
        </body>
        </html>