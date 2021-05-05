<?php
session_start();
include 'connection.php';

$student_added = false;
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "";
    $sql = "SELECT * FROM users WHERE email='".$username."' and  password='".$password."' ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

    if($row["role"] == 0){
        $_SESSION["user"] = "customer";
        $_SESSION["uemail"] = $row['email'];
        echo $row['email'];
        header("location:customer/customer.php");
    }else{
        $_SESSION["user"] = "admin";
        header("location:admin/admin.php");
    }
}

?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div id="header">
            <div id="heading"><a href="index.php"><img src="images/logo.png" height=50 width=50>Artur Car Rental</a></div>
            <div id="menu">
                <div id="menu-item">Call/Whatsapp: +143-99999999</div>
                <div id="menu-item"><a href="login.php">Login/Register</a></div>
            </div>           
        </div>
        <div id="user-login-banner">
                <form method="post" action="">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value=""><br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value=""><br><br><br>
                    <input type="submit" value="Submit" name="submit"><br><br>
                </form>
                New User ? Please <a href="register.php">Register</a>.
        </div>
    </body>
    </html>
