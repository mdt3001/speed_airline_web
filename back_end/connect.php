<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'quanlychuyenbay';

    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn)
    {
        mysqli_query($conn, "SET NAMES 'utf8'");
    }
    else
    {
        echo "Connection failed!";
    }
?>