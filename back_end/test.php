<?php
include 'connect.php';
include 'test.html';

if (isset($_POST['submit'])) {
    $diem_di = $_POST['from'];
    $diem_den = $_POST['to'];
    $ngay_di = $_POST['date'];

    // Call the stored procedure
    $sql = "CALL TIM_CHUYENBAY('$diem_di', '$diem_den', '$ngay_di')";
    $result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    if (isset($row["GIOKHOIHANH"]) && isset($row["GIOHACANH"]) && isset($row["GIAVE"]) && isset($row["TENHANGVE"])) {
        echo "MACB: " . $row["MACB"] . " - NGAYKHOIHANH: " . $row["NGAYKHOIHANH"] . " - GIOKHOIHANH: " . $row["GIOKHOIHANH"] . " - GIOHACANH: " . $row["GIOHACANH"] . " - GIAVE: " . $row["GIAVE"] . " - TENHANGVE: " . $row["TENHANGVE"] . "<br>";
    } else {
        echo "Some keys are missing in the result set.<br>";
        print_r($row);
    }
}
}

?>
