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
                    
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "usbw";
                        $dbname = "mydb";
            
                        $con = mysqli_connect($servername, $username, $password, $dbname);
                        if(!$con){
                            die('Connection failed: ' . mysqli_error());
                        }

                        $id = $_SESSION["id"];
                        echo "<p>ID: " . $id . "</p>";

                        mysqli_select_db($con, "mydb.quote");
		                $result = mysqli_query($con, "SELECT * FROM mydb.quote"); 
		                while($row = mysqli_fetch_array($result)){
                            $query = "SELECT * FROM mydb.products WHERE productID=" . $row['productID'] . " AND " . $row['customerID'] . " = " . $id;
                            $product = mysqli_query($con, $query); 
                            $pInfo = mysqli_fetch_array($product);
                            if($pInfo['productID'] == $row['productID']){
                                echo "<button type='button' class='collapsible'>" . $pInfo['name'] . "</button>";
                                echo "<div class='content'>";
                                echo "<h4>Your Request:</h4>";
                                echo "<p>" . $row['userMessage'] . "</p><br>";
                                echo "<h4>Consultant Response:</h4>";
                                echo "<p>" . $row['reply'] . "</p>";
                                echo "</div><br><br>";
                            }
                        }
                    ?>
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