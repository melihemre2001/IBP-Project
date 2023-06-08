<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "ibpproject");

if(!$conn){
    die("connection failed:" . mysqli_connect_error());
}
else{
    echo "Bağlantı başarılı";
}

