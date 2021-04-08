<?php
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <div class="hero">
            <h1 class="Title">ABC Energy Website</h1>
            <a class="button" href="http://localhost:8080/" onclick="close_window();">
                <img src="/images/logout.png">
                <div class="logout">LOGOUT</div>
            </a>
            <ul class="nav-inline">
                <li><a href="#">Home</a></li>
                <li><a href="consultant_Quotes.php">Customer Quotes</a></li>
                <?php
                    $name = $_SESSION["username"];
                    $id = $_SESSION["id"];
                    echo "<div align='right'>";
                    echo "<p>Name: " . $name . "</p>";
                    echo "<p>ID: " . $id . "</p>";
                    echo "</div>";
                ?>
            </ul>
            <br><br>
            <div align = "center"><br>
                <h2 style="color: aliceblue;">Welcome to the Cunsultant page</h2><br><br><br>
                <p style="color:aliceblue">Here you can see and respone back to the customer quotes</p><br>
                <p style="color: aliceblue;">Use our navigation bar to change between the pages or use the button bellow</p><br><br><br><br>
                <button style="width: 170px;" type="submit" class="submit-btn" onclick="window.open('consultant_Quotes.php','_self','resizable=yes')">Customer Quotes</button> <br>
            </div>  
        </div>

        <script>
            function close_window() {
                if (confirm("Are you sure you want to Exit?")) {
                close();
                }
            }
        </script>
    </body>
</html>