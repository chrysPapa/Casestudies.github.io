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
                <li><a href="#">Quotes</a></li>
                <li><a href="customer_Requested_Quotes.php">Requested Quotes</a></li>
            </ul>
            <br><br>
            <h2 style="text-align: center;">Welcome to the Custmer product quote panel</h2>
            <div align = "center"><br>

                <div class="request">
                    <h3> Product List</h3><br>
                    
                    <select  name="products" id="prodacts">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "usbw";
                            $dbname = "mydb";
                    
                            $con = mysqli_connect($servername, $username, $password);
                            if(!$con){
                                die('Connection failed: ' . mysqli_error());
                            }

                            mysqli_select_db($con, "mydb.products");
		                    $products = mysqli_query($con, "SELECT * FROM mydb.products"); 
                            
                            while($row = mysqli_fetch_array($products)){
                                echo "<option value='volvo'>" . $row['name'] . "</option>";
                            }

                            $con->close();
                        ?>
                        </select><br><br> 
                        <button type="submit" class="collapsible">Continue</button>
                        <div class="content">
                        <form method="post">
                            <textarea name='userMess' id="my-textarea"  maxlength="150"></textarea>
                            <div id="my-textarea-remaining-chars">150 characters remaining</div>
                            <input type="submit" value="Request Quote" class="submit-btn">
                        </form>
                    </div>
                </div>
           </div>
            
            
        </div>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "mydb";

        $con = mysqli_connect($servername, $username, $password, $dbname);
        if(!$con){
            die('Connection failed: ' . mysqli_error());
        }
        //get data for database insertion
        $userMessage = $_POST['userMess'];
        //use product name from selection to get the product ID
        $productName = 
        //access the customer ID from the user file and then get the associated consultantID from the database

        #mysqli_select_db($con, "mydb.quote");
        $sql = $con->prepare("INSERT INTO `quote` (`customerID`, `consultantID`, `productID`, `userMessage`) 
                VALUES (1, 1 ,2, ?)");
        $sql->bind_param("s", $userMessage);
        $sql->execute();
        $sql->close();
        #if ($con->query($sql) === TRUE) {
        #    echo "New record created successfully";
        #} else {
        #    echo "Error: " . $sql . "<br>" . $con->error;
        #    echo "<p>Quote has not been made</P>";
        #}
        $con->close();
    ?>
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