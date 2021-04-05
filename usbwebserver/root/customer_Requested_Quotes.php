<!DOCTYPE html>
<link rel="stylesheet" href="/css/style.css">
<html>
    <head>

    </head>

    <body>
        <div class="hero">
            <h1 class="Title">ABC Energy Website</h1>
            <a class="button" href="#" onclick="close_window(); return false">
                <img src="logout.png">
                <div class="logout">LOGOUT</div>
                
            </a>
            <ul class="nav-inline">
                <li><a href="customer.html">Home</a></li>
                <li><a href="customer_Quotes.html">Quotes</a></li>
                <li><a href="#">Requested Quotes</a></li>
            </ul>
            <br><br>
            <h2 style="text-align: center;">Welcome to Request quotes Customer panel</h2>
            <div align = "center"><br>
                <h3> Quotes</h3>
                <div class="request">
                    <p>Quotes Requested</p><br>
                                        
                    <button type="button" class="collapsible">Product 1</button>
                    <div class="content">
                      <h4>Your Request:</h4>
                      <p>Hello, I would like to have more information on how this product works and we can arange a delivery</p><br>
                      <h4>Consultant Response:</h4>
                      <p>None yet</p>
                    </div><br><br>
                   
                    <button type="button" class="collapsible">Product 2</button>
                    <div class="content">
                      <h4>Your Request:</h4>
                      <p>Hello, I would like to have more information on how this product works and we can arange a delivery</p><br>
                      <h4>Consultant Response:</h4>
                      <p>None yet</p>
                    </div><br><br>

                    <button type="button" class="collapsible">Product 3</button>
                    <div class="content">
                      <h4>Your Request:</h4>
                      <p>Hello, I would like to have more information on how this product works and we can arange a delivery</p><br>
                      <h4>Consultant Response:</h4>
                      <p>None yet</p>
                    </div><br><br>
                </div>
        </div>


    </body>

    <script>
        function close_window() {
            if (confirm("Are you sure you want to Exit?")) {
            close();
            }
        }

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) 
        {
            coll[i].addEventListener("click", function() 
            {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                content.style.display = "none";
                } else {
                content.style.display = "block";
                }
            });
        }
    </script>


</html>