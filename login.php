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
$stylesheet_url = "style.css";
$url = "style.css";
echo "<link rel='stylesheet' href='{$stylesheet_url}'>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style><?php include 'C:\xampp\htdocs\dashboard\IBP Project\style.css'; ?></style>
</head>

<body>
    <div class="loginform" style="position:absolute ">
        <h1>Login</h1>
        <form action="" class="" method="post" autocomplete="off">

            <label for="usernameemail">Username or Email : </label>
            <input type="text" name="usernameemail" id="usernameemail" requiredvalue=""> <br>
            <label for="name">Password: </label>
            <input type="password" name="password" id="password" requiredvalue=""> <br>
            <button type="submit" name="submit">Login</button>
        </form>
        <br>
        <a href="register.php">Register</a>
    </div>

</body>

</html>