<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">log in</button>
                <button type="button" class="toggle-btn" onclick="register()">register</button>
            </div>
        <form id="login" class="input-group">
            <input type="text" class="input-field" placeholder="User Id" required>
            <input type="text" class="input-field" placeholder="Enter password" required>
            <button type="submit" class="submit-btn">Log in</button>
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
    </script>
</body>


</html>
