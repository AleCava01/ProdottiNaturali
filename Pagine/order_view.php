<html>
    <head>
        <title>Ordini</title>
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
        <link rel="stylesheet" type="text/css" href="CSS/order_view.css">
        <link rel="icon" href="Images/favicon.ico"/>

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
            document.getElementById("location_indicator").innerHTML = "Ordini";
        </script>
        <?php
        $orders = mysqli_query($conn, "SELECT id_o,data,via,civico,citta,cap,provincia,pagamento,spedizione,importo,note,stato FROM ordine WHERE stato=1 AND id_u=".$_SESSION["id_u"]);
        $order = mysqli_fetch_assoc($orders);
        echo("<table class='order_view_table'>");
        echo("<tr class='order_view_tr'>");
        echo("<th class='order_view_th'>Data</th>");
        echo("<th class='order_view_th'>Indirizzo</th>");
        echo("<th class='order_view_th'>CAP</th>");
        echo("<th class='order_view_th'>Citta</th>");
        echo("<th class='order_view_th'>Pagamento</th>");
        echo("<th class='order_view_th'>Spedizione</th>");
        echo("<th class='order_view_th'>Importo</th>");
        echo("<th class='order_view_th'>Visualizza</th>");
        echo("<th class='order_view_th'>Stato</th>");
        echo("<th class='order_view_th'>Note</th>");

        function pagamento_transform($pagamento){
            if($pagamento==1){
                return "Carta di credito";
            }
            else if($pagamento==2){
                return "Bonifico Bancario";
            }
            else if($pagamento==3){
                return "Gift Card";
            }
            else if($pagamento==4){
                return "Contrassegno";
            }
        }
        function spedizione_transform($spedizione){
            if($spedizione==1){
                return "Prioritaria";
            }
            else if($spedizione==2){
                return "Standard";
            }
            else if($spedizione==3){
                return "Low-Cost";
            }
        }
        function stato_transform($stato){
            if($stato==1){
                return "Confermato";
            }
            else if($stato==2){
                return "Spedito";
            }
            else if($stato==3){
                return "Consegnato";
            }
            else if($stato==4){
                return "Annullato";
            }
        }
        while($order){
            echo("<tr class='order_view_tr'>");
            echo("<td class='order_view_td'>".$order["data"]."</td>");
            echo("<td class='order_view_td'>".$order["via"]." ".$order["civico"]."</td>");
            echo("<td class='order_view_td'>".$order["cap"]."</td>");
            echo("<td class='order_view_td'>".$order["citta"]."(".$order["provincia"].")</td>");
            echo("<td class='order_view_td'>".pagamento_transform($order["pagamento"])."</td>");
            echo("<td class='order_view_td'>".spedizione_transform($order["spedizione"])."</td>");
            echo("<td class='order_view_td'>".$order["importo"]." €</td>");
            echo("<td class='order_view_td'><a href='order_products_view.php?id_o=".$order["id_o"]."'><img style='width:25px; height:25px' src='Images/lente.png'></a></td>");
            echo("<td class='order_view_td'>".stato_transform($order["stato"])."</td>");
            echo("<td class='order_view_td'>".$order["note"]."</td>"); 
            echo("</tr>");
            $order = mysqli_fetch_assoc($orders);
        }
        echo("</table>");
        ?>
    </body>
</html>