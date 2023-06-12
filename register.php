<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Register Successful'); </script>";
        } else {
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: black;
            display: flex;
            font-family: sans-serif;
        }

        .navbar-logo-login {
            width: 200px;
            height: 200px;
        }

        .navbar-logo-login img {
            width: 200px;
            height: 200px;
            display: block;
            position: absolute;
        }

        .login-container {
            margin: auto;
            width: 500px;
            max-width: 90%;
        }

        .login-container form {
            width: 100%;
            padding: 20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .login-container form h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #222;
        }

        .login-container form .form-control {
            width: 100%;
            height: 40px;
            background: white;
            border-radius: 4px;
            border: 1px solid silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;
        }

        .login-btn {
            margin-left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 34px;
            border: none;
            outline: none;
            background: #27a327;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: 0.3s;
        }

        .login-btn:hover {
            opacity: 0.7;
        }

        .register-btn {
            margin-left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 34px;
            border: none;
            outline: none;
            background: red;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: 0.3s;
        }

        .register-btn:hover {
            opacity: 0.7;
        }
        .btn{
            display: flex;
            justify-content: space-between;
        }
    </style>

</head>


<body>

    <div class="login-container">
        <form action="register.php" class="" method="post" autocomplete="off">
            <h1>Register</h1>
            <div class="form-group">
                <label for="name"></label>
                <input type="text" class="form-control" name="name" id="name" requiredvalue="" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" name="username" id="username" requiredvalue="" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class="form-control" name="email" id="email" requiredvalue="" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" name="password" id="password" requiredvalue="" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirmpassword"></label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" requiredvalue="" placeholder="Confirm Password">
            </div>

            <div class="btn">
                <button type="submit" name="submit" class="register-btn">Register</button>
            </div>
        </form>
        <a href="login.php"> <button class="login-btn">Login</button></a>
    </div>
</body>

</html>