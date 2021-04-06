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
                <li><a href="consultant.html">Home</a></li>
                <li><a href="#">Customer Quotes</a></li>
            </ul>
            <br><br>
            <h2 style="text-align: center;">Quote Requests quotes from users</h2>
            <div align = "center"><br>
                <h3> Quotes</h3>
                <div class="request">
                    <div id="requests">
                        <button type="button" class="collapsible">Request 1</button>
                        <div class="content">
                            <h4>Customer ID: PHP NAME</h4>
                            <h4>PHP NAME Request:</h4>
                            <p>Hello, I would like to have more information on how this product works and we can arange a delivery</p><br>

                            <h4>Type your repsonse</h4>
                            
                            <textarea id="my-textarea"  maxlength="150"></textarea>
                            <div id="my-textarea-remaining-chars">150 characters remaining</div>
                            <input onClick="window.location.reload()" type="submit" value="Response" class="submit-btn">
                    </div>
                </div>
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

        const myTextArea = document.getElementById("my-textarea");
        const remainingCharsText = document.getElementById("my-textarea-remaining-chars");
        const MAX_CHARS = 150;

        myTextArea.addEventListener('input',() => {
           const remaining = MAX_CHARS - myTextArea.value.length;
           const color = remaining < MAX_CHARS * 0.1 ? 'red' : null;

           remainingCharsText.textContent = `${remaining} characters remaining`;
           remainingCharsText.style.color = color;
        });
    </script>


</html>