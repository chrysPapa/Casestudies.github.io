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
           <input type="text" class="input-field" placeholder="Username/E-mail" required>
            <input type="text" class="input-field" placeholder="password" required>
            <br>
            <br>
            <!--BUTTON TO BE USED FOR LOGIN-->
            <button class="submit-btn" type="submit" name="login">Login</button><br>

            <p style="float: left; width: 130px"><button type="submit" class="submit-btn" onclick="window.open('customer.php','_blank','resizable=yes')">Customer</button></p>
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
