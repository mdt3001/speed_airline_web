<?php
include 'connect.php';
include '../front_end/login_page/login.html';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $unhash = $_POST['password'];
    $salt = "SELECT SALT FROM KHACHHANG WHERE EMAIL = '$username'";
    $result1 = mysqli_query($conn, $salt);

    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        if ($row1) {
            $salt = $row1['SALT'];
        } else {
            // Handle error - no user with the given email
        }
    } else {
        // Handle error - the query failed
    }
    $password = hash('sha256', $unhash . $salt);
   

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