<html>
    <head>
        <title>Checkout</title>
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
        <link rel="stylesheet" type="text/css" href="CSS/order.css">

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
            document.getElementById("location_indicator").innerHTML = "Checkout";
        </script>
    
        <div class="content_div">
        <div class="order_div">
            <?php
            $id_u = $_SESSION["id_u"];
            $id_o = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_o FROM ordine WHERE stato=0 AND id_u=".$id_u))["id_o"];
            $importo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(importo_parziale) as tot FROM carrello WHERE id_o=".$id_o))["tot"];
            ?>
            <p class="order_p_title">concludi ordine</p>
            <hr>
            <input class="order_input" type="text" id="via_input" placeholder="Via"/>
            <br>
            <input class="order_input" type="number" id="civico_input" placeholder="Civico"/>
            <br>
            <input class="order_input" type="number" id="CAP_input" placeholder="CAP"/>
            <br>
            <input class="order_input" type="text" id="citta_input" placeholder="Citta"/>
            <br>
            <input class="order_input" type="text" id="provincia_input" placeholder="Provincia"/>
            <br>
            <select class="order_select" id="pagamento_input">
                <option class="order_option_default" value="0">Modalità di pagamento</option>
                <option class="order_option" value="1">Carta di credito</option>
                <option class="order_option" value="2">Bonifico Bancario</option>
                <option class="order_option" value="3">Gift Card</option>
                <option class="order_option" value="4">Contrassegno</option>
            </select>
            <br>
            <select class="order_select" id="spedizione_input">
                <option class="order_option_default" value="0">Spedizione</option>
                <option class="order_option" value="1">Prioritaria</option>
                <option class="order_option" value="2">Standard</option>
                <option class="order_option" value="3">Low-Cost</option>
            </select>
            <br>
            <?php
            echo("<p class='order_p'>totale: ".$importo." €</p>");
            ?>
            <button class="order_button" onclick="submit()">acquista</button>
        </div>
        <p class="server_response_p" id="serverResponse"></p>

        <div class="summary_div">
            <p class="order_p_title">order summary</p>
        <?php
            $cart_items = $conn->query("SELECT f.misura, p.immagine, f.id_f, o.id_o, f.capacita, c.quantita, c.importo_parziale, p.nome FROM carrello as c, formato as f, prodotto as p, ordine as o WHERE o.stato=0 AND c.id_f = f.id_f AND f.id_p=p.id_p AND c.id_o=o.id_o AND o.id_u=".$_SESSION['id_u']);
            $cart_item = mysqli_fetch_assoc($cart_items);
            echo("<table class='summary_table'>");
            echo("<tr class='summary_tr'>");
            echo("<th class='summary_td'>Immagine</th>");
            echo("<th class='summary_td'>Prodotto</th>");
            echo("<th class='summary_td'>Formato</th>");
            echo("<th class='summary_td'>Quantità</th>");
            echo("<th class='summary_td'>Importo</th>");
            echo("<th class='summary_td'>Elimina</th>");
            echo("<tr>");
            while($cart_item){
                echo("<tr class='summary_tr'>");
                echo("<td class='summary_td' style='width:130px;'><img style='width:130px; height:130px;' src='Images/Prodotti/".$cart_item["immagine"]."'></td>");
                echo("<td class='summary_td'>".$cart_item["nome"]."</td>");
                echo("<td class='summary_td'>".$cart_item["capacita"]." ".$cart_item["misura"]."</td>");
                echo("<td class='summary_td'>".$cart_item["quantita"]."</td>");
                echo("<td class='summary_td'>".$cart_item["importo_parziale"]." €</td>");
                echo("<td class='summary_td'><a href='remove_cart_item.php?id_o=".$cart_item["id_o"]."&id_f=".$cart_item["id_f"]."'><img style='width:22px; height:22px' src='Images/x_icon.png'</a></td>");
                echo("</tr>");
                $cart_item = mysqli_fetch_assoc($cart_items);
            }
            echo("</table>");
            
          ?>
        </div>
        </div>
        <script type="text/javascript">
            const xhr = new XMLHttpRequest();

            function submit(){
                var via_input = document.getElementById("via_input").value;
                var civico_input = document.getElementById("civico_input").value;
                var CAP_input = document.getElementById("CAP_input").value;
                var citta_input = document.getElementById("citta_input").value;
                var provincia_input = document.getElementById("provincia_input").value;
                var pagamento_input = document.getElementById("pagamento_input").value;
                var spedizione_input = document.getElementById("spedizione_input").value;

                if(via_input!=""&&civico_input!=""&&CAP_input!=""&&citta_input!=""&&provincia_input!=""&&pagamento_input!=0&&spedizione_input!=0){
                    xhr.onload = function(){
                        const serverResponse = document.getElementById("serverResponse");
                        serverResponse.innerHTML = this.responseText;
                        location.reload();
                    };
                    xhr.open("POST","order_script.php");
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send(
                    "via="+via_input+
                    "&civico="+civico_input+
                    "&CAP="+CAP_input+
                    "&citta="+citta_input+
                    "&provincia="+provincia_input+
                    "&pagamento="+pagamento_input+
                    "&spedizione="+spedizione_input
                    );
                }
                else{
                    document.getElementById("serverResponse").innerHTML = "Riempire tutti i campi";
                }
            }
        </script>
        

    </body>
</html>