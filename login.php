<?php
require 'config.php';
if (isset($_POST["submit"])) {

    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            height: 100%;
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

        .login-container form .login-btn {
            margin-left: 25%;
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

        .login-container form .login-btn:hover {
            opacity: 0.7;
        }

        .register-btn {
            margin-left: 80%;
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

        .btn {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
    </style>

</head>




</head>

<body>

    <div class="login-container">
        <form action="" class="" method="post" autocomplete="off">
            <h1>Login</h1>
            <div class="form-group">
                <label for="usernameemail"></label>
                <input type="text" class="form-control" name="usernameemail" id="usernameemail" requiredvalue="" placeholder="Username or Email">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" name="password" id="password" requiredvalue="" placeholder="Password">
            </div>
            <div class="btn">
                <button type="submit" name="submit" class="login-btn">Login</button>
            </div>
        </form>
        <a href="register.php"><button class="register-btn">Register</button></a>
    </div>

</body>

</html>