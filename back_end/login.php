<?php
include 'connect.php';
include '../front_end/login_page/login.html';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $username = mysqli_real_escape_string($conn, $username);
    // $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM KHACHHANG WHERE EMAIL = '$username' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        header("Location: home_page.php");
        
    } else {
        // Login failed
        echo "<script> 
        const errorSpan = document.querySelector('.error-message');
        console.log(errorSpan);
        errorSpan.textContent='Username or password is incorrect';
        </script>";
    }
}

?>
