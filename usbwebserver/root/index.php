<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
    
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <h2 style="text-align:center">ABC Energy Portal</h2>
            <div class="button-box">
                <h3>Login Section</h3>
            </div><br>
            <p style="text-align:center">Hello! please enter your credentials.</p>
        <form method="post" id="login" class="input-group">
           <input name='username' type="text" class="input-field" placeholder="Username/E-mail" required>
            <input name='password' type="text" class="input-field" placeholder="password" required>
            <br>
            <br>
            <!--BUTTON TO BE USED FOR LOGIN--><br><br>
            <button class="submit-btn" type="submit" name="login">Login</button><br>
            <!--use login form-->
            <?php
                session_start();    #Allows use of session storage
                $servername = "localhost";
                $username = "root";
                $password = "usbw";
                $dbname = "mydb";
    
                $con = mysqli_connect($servername, $username, $password, $dbname);
                #$con = mysqli_connect($servername, $username, $password);
                if(!$con){
                    die('Connection failed: ' . mysqli_error());
                }
                $username = $_POST['username'];
                $password = $_POST['password'];

                mysqli_select_db($con, "mydb.customer");
		        $result = mysqli_query($con, "SELECT * FROM mydb.customer"); 
		        while($row = mysqli_fetch_array($result)){
                    if(strcmp($row['username'], $username) == 0){   //If you find the customer
                        echo $row['username'] . " " .  $row['email'] . " " . $row['password'] . " " . $row['customerID'];	#DEBUG
                        if(strcmp($row['password'], $password) == 0){  
                            
                            $id = $row['customerID'];
                            $uName = $row['username'];
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $uName;
                            header("Location: http://localhost:8080/customer.php", true, 301);
                            exit();
                        }
                        else{
                            //password wrong
                        }
                    } else{
                        //Not a customer
                    }
		        }

                //check consultants
                mysqli_select_db($con, "mydb.consultant");
		        $result = mysqli_query($con, "SELECT * FROM mydb.consultant"); 
		        while($row = mysqli_fetch_array($result)){
                    if(strcmp($row['username'], $username) == 0){   //If you find the customer
                        echo $row['username'] . " " .  $row['email'] . " " . $row['password'];	#DEBUG
                        if(strcmp($row['password'], $password) == 0){  
                            $id = $row['consultantID'];
                            $uName = $row['username'];
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $uName;
                            header("Location: http://localhost:8080/consultant.php", true, 301);
                            exit();
                        }
                        else{
                            //password wrong
                        }
                    } else{
                        //Not a customer
                    }
		        }

                $user->close();
                $con->close();

            ?>
            <!--<p style="float: left; width: 130px"><button type="submit" class="submit-btn" onclick="window.open('customer.php','_blank','resizable=yes')">Customer</button></p>-->
            <!--<p style ="float: none; width: 130px"></p><button type="submit" class="submit-btn" onclick="window.open('consultant.html','_blank','resizable=yes')">Consultant</button>-->
            <!--<br>-->
            <!--<button type="submit" class="submit-btn" onclick="window.open('manager.html','_blank','resizable=yes')">Manager</button></p>-->
        </form>
    </div>
</body>


</html>
