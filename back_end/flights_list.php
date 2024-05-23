<?php
include 'connect.php';
$diem_di = urldecode($_GET['diem_di']);
$diem_den = urldecode($_GET['diem_den']);
$ngay_di = urldecode($_GET['ngay_di']);
    $sql = "CALL TIM_CHUYENBAY('$diem_di', '$diem_den', '$ngay_di')";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($row["MACB"]) && isset($row["NGAYKHOIHANH"]) && isset($row["GIOKHOIHANH"]) && isset($row["GIOHACANH"]) && isset($row["GIAVE"]) && isset($row["TENHANGVE"])) {
            echo "MACB: " . $row["MACB"] . " - NGAYKHOIHANH: " . $row["NGAYKHOIHANH"] . " - GIOKHOIHANH: " . $row["GIOKHOIHANH"] . " - GIOHACANH: " . $row["GIOHACANH"] . " - GIAVE: " . $row["GIAVE"] . " - TENHANGVE: " . $row["TENHANGVE"] . "<br>";
        } else {
            echo "Some keys are missing in the result set.<br>";
            print_r($row);
        }
    }

    mysqli_close($conn);



?>