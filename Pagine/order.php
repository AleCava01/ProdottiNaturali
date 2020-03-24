<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="CSS/login.css">
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">

    </head>
    <body>
    <!--NAVBAR-->
        <nav class="nav">
        <ul class="nav_ul">
            <li class="nav_li" style="float:right;"><a class="nav_a" href="homepage.php">Prodotti Naturali</a></li>
            <li class="nav_li" style="float:left"><a class="nav_a" href="order.php">Acquista</a>
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
            <li class="nav_li" style="float:left">
            <?php
            session_start();
            echo("<a class='nav_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
            ?>
            </li>
        </ul>
        </nav>
        <!---->
        <br>
        <br>
        <br>
        <br>
        <div style="display:grid;">
            <input type="text" id="via_input" placeholder="Via"/>
            <input type="number" id="civico_input" placeholder="Civico"/>
            <input type="number" id="CAP_input" placeholder="CAP"/>
            <input type="text" id="citta_input" placeholder="Citta"/>
            <input type="text" id="provincia_input" placeholder="Provincia"/>
            <input type="text" id="pagamento_input" placeholder="Modalità di pagamento"/>
            <input type="text" id="spedizione_input" placeholder="Tipologia di spedizione"/>

            <button onclick="submit()">Concludi ordine</button>
            <p id="serverResponse"></p>
            <a href="homepage.php">Annulla ordine</a>

        </div>
        
        <script type="text/javascript">
            const xhr = new XMLHttpRequest();

            function submit(){
                var username_input = document.getElementById("username_input").value;
                var password_input = document.getElementById("password_input").value;
                var email_input = document.getElementById("email_input").value;
                var nome_input = document.getElementById("nome_input").value;
                var cognome_input = document.getElementById("cognome_input").value;
                var via_input = document.getElementById("via_input").value;
                var civico_input = document.getElementById("civico_input").value;
                var CAP_input = document.getElementById("CAP_input").value;
                var citta_input = document.getElementById("citta_input").value;
                var provincia_input = document.getElementById("provincia_input").value;
                
                if(username_input != "" && password_input != "" && email_input != "" && nome_input!="" &&cognome_input!=""&&via_input!=""&&civico_input!=""&&CAP_input!=""&&citta_input!=""&&provincia_input!=""){
                    xhr.onload = function(){
                        const serverResponse = document.getElementById("serverResponse");
                        if(this.responseText == "success"){
                            location.href = "homepage.php";
                        }
                        serverResponse.innerHTML = this.responseText;
                    };
                    xhr.open("POST","register_script.php");
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("username="+username_input+
                    "&password="+password_input+
                    "&email="+email_input+
                    "&nome="+nome_input+
                    "&cognome="+cognome_input+
                    "&via="+via_input+
                    "&civico="+civico_input+
                    "&CAP="+CAP_input+
                    "&citta="+citta_input+
                    "&provincia="+provincia_input
                    );
                }
                else{
                    document.getElementById("serverResponse").innerHTML = "Riempire tutti i campi";
                }
            }
        </script>
        

    </body>
</html>