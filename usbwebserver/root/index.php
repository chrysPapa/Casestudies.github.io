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
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">log in</button>
                <button type="button" class="toggle-btn" onclick="register()">register</button>
            </div>
            <p style="text-align:center">Hello! please enter your credentials.</p>
        <form id="login" class="input-group">
           <input name='uname' type="text" class="input-field" placeholder="Username/E-mail" required>
            <input type="text" class="input-field" placeholder="password" required>
            <br>
            <br>
            <p style="float: left; width: 130px"><button type="submit" class="submit-btn" onclick="window.open('customer.html','_blank','resizable=yes')">Customer</button></p>
            <p style ="float: none; width: 130px"></p><button type="submit" class="submit-btn" onclick="window.open('consultant.html','_blank','resizable=yes')">Consultant</button>
            <br>
            <button type="submit" class="submit-btn" onclick="window.open('manager.html','_blank','resizable=yes')">Manager</button></p>
        </form>
        <form id="register" class="input-group">
            <input type="text" class="input-field" placeholder="User Id" required>
            <input type="text" class="input-field" placeholder="Enter password" required>
            <label class="checkbox-inline">
                <input type="checkbox" class="chech-box" value=""> <span>Customer</span>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" class="chech-box" value=""> <span>Consultant</span>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" class="chech-box" value=""> <span>Manager</span>
            </label>
            <button type="submit" class="submit-btn">Register</button>
        </form>
        </div>
    </div>

    <?php

		//--------EXAMPLE SERVER CONNECTION---------
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "mydb";

		$con = mysqli_connect($servername, $username, $password);
		if(!$con){
			die('Connection failed: ' . mysqli_error());
		}
		
		//echo 'Connected Successfully'; //DEBUG

		//---------EXAMPLE DATABASE READ-----------
		mysqli_select_db($con, "mydb.customer");
		$result = mysqli_query($con, "SELECT * FROM mydb.customer"); 
		while($row = mysqli_fetch_array($result)){
		//This returns html code (to see output use inspect in chrome)
			echo $row['username'] . " " .  $row['email'] . " " . $row['password'];	
			echo "<br>";
		}


		mysqli_close($con);

        //$classname = 'review-text';
        //$dom = new DOMDocument;
        //$dom->validateOnParse = true;
        //$dom->load('index.php');
        //$element = $dom->getElementById('Uname');
        //$results = $xpath->query(div[@class="review-text"]);


		$element->setAttribute('Test');
		$txt = $html->saveHTML();
    ?>

    <script>
        var x= document.getElementById("login");
        var y= document.getElementById("register");
        var z= document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

        function lockin() {
            location.replace("page.html");
        }
    </script>
</body>


</html>
