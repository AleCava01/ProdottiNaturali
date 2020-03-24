<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="CSS/login.css">
        <link rel="stylesheet" type="text/css" href="CSS/navbar.css">

    </head>
    <body>
        <!--NAVBAR-->
        <ul class="nav_ul">
        <li class="nav_li"><img src="logo.png"></li>
        <li class="nav_li"><a class="nav_a" href="homepage.php">Prodotti Naturali</a></li>
        <li class="nav_li" style="float:right"><a class="nav_a" href="order.php">Carrello</a></li>
        <li style="float:right" class="nav_li">
            <?php
            session_start();
            echo("<a class='nav_a' href='profile.php'>Logged as: ".$_SESSION["username"]."</a>");
            ?>
        </li>
        </ul>
        <!---->
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