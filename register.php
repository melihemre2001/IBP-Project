<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0 ){
        echo
            "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Register Successful'); </script>";
        }
        else{
           echo
                "<script> alert('Password Doesn't Match'); </script>";
    
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
</head>
<body>
<h1>Register</h1>
    <form action="" class="" method="post" autocomplete ="off">

        <label for="name">Name: </label>
        <input type="text" name="name" id="name" requiredvalue = ""> <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" requiredvalue = ""> <br>
        <label for="name">Email: </label>
        <input type="text" name="email" id="email" requiredvalue = ""> <br>
        <label for="name">Password: </label>
        <input type="password" name="password" id="password" requiredvalue = ""> <br>
        <label for="name">Confirm Password: </label>
        <input type="password" name="confirmpassword" id="confirmpassword" requiredvalue = ""> <br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
</body>
</html>