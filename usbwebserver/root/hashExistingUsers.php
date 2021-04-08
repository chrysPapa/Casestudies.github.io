<!DOCTYPE html>
<link rel="stylesheet" href="/css/style.css">
<html>
    <head>

    </head>


    <body>
        <div class="hero">
            <h1 class="Title">ABC Energy Hidden Website script</h1>
        
            <a class="button" href="http://localhost:8080/" onclick="close_window();">
                <img src="/images/logout.png">
                <div class="logout">Main site</div>
            </a>
        <!-- <ul class="nav-inline">
            <li><a href="consultant.php">Home</a></li>
        </ul> -->


        <div align = "center"><br>
        <h2 style="text-align: center; color: aliceblue;">Example script</h2>
        <p style="color: aliceblue;">This php page is just a tool I used to Hash all the passwords that users had in the database.</p>
        <p style="color: aliceblue;">This was done because as of yet there's no official way to create a new user on the website<p>
        <p style="color: aliceblue;">Normally a password would be hashed when the new user creates their account and it's hashed and stored straight away <p>
        <br><br>
        <div id="requests">
            <p>By pressing this button the script will:</p>
            <p>1.Pull all users from the database</P>
            <p>2.Go through each of the passwords</P>
            <p>3.Hash the password</P>
            <p>4.Update the tables with the new hashed passwords</P>

            <form method='post'>
            <input type='submit' value="Hash passwords" class="submit-btn"></input>
            </form>
        </div>
        

        </div>
    </body>
<?php
    #This php page is just a tool I used to Hash all the passwords that users had in the database.
    #This was done because as of yet there's no official way to create a new user on the website
    #Normally a passowrd would be hashed when the new user creates their account and it's hashed 
    #and stored straight away



    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbname = "mydb";
                
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con){
        die('Connection failed: ' . mysqli_error());
    }


?>