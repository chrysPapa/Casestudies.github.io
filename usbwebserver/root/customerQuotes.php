<?php
    session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="/css/style.css">
<html>
    <head>

    </head>

    <body>
        <div class="hero">
            <h1 class="Title">ABC Energy Website</h1>
            <a class="button" href="#" onclick="close_window(); return false">
                <img src="/images/logout.png">
                <div class="logout">LOGOUT</div>
                
            </a>
            <ul class="nav-inline">
                <li><a href="customer.php">Home</a></li>
                <li><a href="#">Quotes</a></li>
                <li><a href="customer_Requested_Quotes.php">Requested Quotes</a></li>
            </ul>
            <br><br>
            <h2 style="text-align: center;">Welcome to the Custmer product quote panel</h2>
            <div align = "center"><br>

                <div class="request">
                    <h3> Product List</h3><br>
                    
                    <select  name="products" id="prodacts" form="newQuote">
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
                                echo "<option value=" . $row['productID'] . ">" . $row['name'] . "</option>";
                            }

                            $con->close();
                        ?>
                        </select><br><br> 
                        <button type="submit" class="collapsible">Continue</button>
                        <div class="content">
                        <form method="post" id="newQuote">
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
            
            //access the customer ID from the session and then get the associated consultantID from the database
            $id = $_SESSION["id"];

            mysqli_select_db($con, "mydb.customer");
            $result = mysqli_query($con, "SELECT * FROM mydb.customer WHERE customerID=$id"); 
            $row = mysqli_fetch_array($result);
            $consultant = $row['consultantID'];
            
            //get product ID
            $productID = $_POST['products'];

            //echo $consultant . ", ". $id . ", ". $productID;  #DEGBUG

            $sql = $con->prepare("INSERT INTO `quote` (`customerID`, `consultantID`, `productID`, `userMessage`) 
                    VALUES (?, ? ,?, ?)");
            $sql->bind_param("iiis", $id, $consultant, $productID, $userMessage);
            $sql->execute();

            $sql->close();
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