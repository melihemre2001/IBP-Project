<?php

$conn = mysqli_connect("localhost", "root", "", "ibpproject");

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}


    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
