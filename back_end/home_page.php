<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $diem_di = urlencode($_POST['from']);
    $diem_den = urlencode($_POST['to']);
    $ngay_di = urlencode($_POST['date']);
    // Redirect to flights_list.php with parameters
    header("Location: flights_list.php?diem_di=$diem_di&diem_den=$diem_den&ngay_di=$ngay_di");
    exit;
    // Call the stored procedure
//     $sql = "CALL TIM_CHUYENBAY('$diem_di', '$diem_den', '$ngay_di')";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) == 1) {
//         // Login successful
//         header("Location: test.php");
//         exit;
//     }

  

//     while ($row = mysqli_fetch_assoc($result)) {
//         if (isset($row["MACB"]) && isset($row["NGAYKHOIHANH"]) && isset($row["GIOKHOIHANH"]) && isset($row["GIOHACANH"]) && isset($row["GIAVE"]) && isset($row["TENHANGVE"])) {
//             echo "MACB: " . $row["MACB"] . " - NGAYKHOIHANH: " . $row["NGAYKHOIHANH"] . " - GIOKHOIHANH: " . $row["GIOKHOIHANH"] . " - GIOHACANH: " . $row["GIOHACANH"] . " - GIAVE: " . $row["GIAVE"] . " - TENHANGVE: " . $row["TENHANGVE"] . "<br>";
//         } else {
//             echo "Some keys are missing in the result set.<br>";
//             print_r($row);
//         }
//     }

//     mysqli_close($conn);
}
include '../front_end/home_page/home.html';
?>