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
            <a class="button" href="http://localhost:8080/" onclick="close_window();">
                <img src="/images/logout.png">
                <div class="logout">LOGOUT</div>
                
            </a>
            <ul class="nav-inline">
                <li><a href="consultant.php">Home</a></li>
                <li><a href="#">Customer Quotes</a></li>
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
            <h2 style="text-align: center; color: aliceblue;">Customer Requests</h2>
            <div align = "center"><br>
                <p style="color: aliceblue;">Bellow you can find all the requestes from the customers waiting a response.</p><br><br>
                <h3 style="color: aliceblue;"> Quotes</h3>
                <div class="request">
                    <div id="requests">
                        <div align='right'>
                            <p>Filter by customer</p>
                            <form method='post' form="showQuotes">
                            <select  name="customers" id="custID">
                                <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "usbw";
                                    $dbname = "mydb";
                    
                                    $con = mysqli_connect($servername, $username, $password);
                                    if(!$con){
                                        die('Connection failed: ' . mysqli_error());
                                    }

                                    #$customerID = $_POST['customers'];
                                    $id = $_SESSION['id'];
                                    #echo $customerID . " , " . $id;

                                    mysqli_select_db($con, "mydb.quote");
                                    $query = "SELECT * from mydb.quote WHERE consultantID = " . $id . " group by customerID";
		                            $customers = mysqli_query($con, $query); 
                                
                                    while($row = mysqli_fetch_array($customers)){
                                        $query2 = "SELECT * from mydb.customer WHERE customerID = " . $row['customerID'];
                                        $customerDetails = mysqli_query($con, $query2); 
                                        while($Details = mysqli_fetch_array($customerDetails)){
                                            echo "<option value=" . $row['customerID'] . ">ID: " . $row['customerID'] . " " . $Details['username'] . "</option>";
                                        }
                                    
                                    }
                                    $con->close();
                                ?>

                            </select>
                            <br><br>
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
    
                            $id = $_SESSION["id"];

                            mysqli_select_db($con, "mydb.quote");
		                    $result = mysqli_query($con, "SELECT * FROM mydb.quote WHERE consultantID=" . $id); 
                            $count = 1;
                            while($row = mysqli_fetch_array($result)){
                                
                                if(empty($row['reply'])){
                                    echo "<form method='post' id='replyForm'>";
                                    echo "<button type='button' name='btn' class='collapsible'>Request " . $count . "</button>";
                                    echo "<div class='content'>";
                                    echo "<h4 name='custID'>Customer ID: " . $row['customerID'] . "</h4>";
                                    echo "<h4 name='prodID'>Product ID: " . $row['productID'] . "</h4>";
                                    echo "<h4>User Message:</h4>";
                                    echo "<p>" . $row['userMessage'] . "</p><br>";
                                    echo "<h4>Type your repsonse</h4>";
                                    echo "<textarea name='newReply' id='my-textarea'  maxlength='150'></textarea>";
                                    echo "<div id='my-textarea-remaining-chars'>150 characters remaining</div>";
                                    echo "<input type='submit' name=" . $count . " onClick='window.location.reload()' value='Respond' class='submit-btn'></div><br><br>";
                                    echo "</form>";
                                    //Commit Variables to session
                                    //create array of form data
                                    $formData = array($row['customerID'], $row['productID']);
                                    if(!isset($_SESSION['form' . $count])){
                                        $_SESSION['form' . $count] = $formData;
                                    }
                                    else
                                    {
                                        $_SESSION['form' . $count] = $formData;
                                    }

                                }else{
                                    echo "<button type='button' class='collapsible'>Request " . $count . "</button>";
                                    echo "<div class='content'>";
                                    echo "<h4>Customer ID: " . $row['customerID'] . "</h4>";
                                    echo "<h4>User Message:</h4>";
                                    echo "<p>" . $row['userMessage'] . "</p><br>";
                                    echo "<h4>Reply</h4>";
                                    echo "<p>" . $row['reply'] . "</p></div><br><br>";
                                }
                                $count = $count + 1;
                            }

                            //UPDATE quote SET reply = "hello there" WHERE customerID = 2 AND consultantID = 2 AND productID = 5
                            

                            mysqli_select_db($con, "mydb.quote");

                            $formID;
                            //getting form ID
                            foreach($_POST as $name => $content) { 
                                if($content == "Respond"){
                                    $formID = $name;
                                }
                                #echo "The HTML name: $name <br>";
                                #echo "The content of it: $content <br>";
                            }

                            //echo $formID . "<br>";  #DEBUG

                            $data = $_SESSION['form' . $formID];
                            //echo $data[0] . " , " . $data[1] . "<br>";  #DEBUG
                            //Check if text box has something in it
                            //if yes update table
                            $replyMess = $_POST['newReply'];
                            //echo $replyMess;  #DEBUG
                            //if(!strlen(trim($replyMess))){
                                #echo $replyMess;
                                #echo $data[0] . " , " . $data[1] . "<br>";
                                $sql = $con->prepare("UPDATE quote SET reply = ? WHERE customerID = ? AND consultantID = ? AND productID = ?");
                                $sql->bind_param("siii", $replyMess, $data[0], $id, $data[1]);
                                $sql->execute();

                                $sql->close();
                            //}else{
                                //echo "<p>Please type a reply into the box before submitting</p>";
                            //}

                            $con->close();
                        ?>
                        </form>
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