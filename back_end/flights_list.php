<?php
include 'connect.php';

$diem_di = urldecode($_GET['diem_di']);
$diem_den = urldecode($_GET['diem_den']);
$ngay_di = urldecode($_GET['ngay_di']);
$sql = "CALL TIM_CHUYENBAY('$diem_di', '$diem_den', '$ngay_di')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../front_end/flights_list/flights_list.css" />
    <link rel="stylesheet" href="../front_end/themify-icons/themify-icons.css" />
    <title>Web Design Mastery | Flivan</title>
</head>

<body>
    <nav>
        <div class="nav__logo">SPEED</div>
        <ul class="nav__links">
            <li class="link"><a href="#">Home</a></li>
            <li class="link"><a href="#">About</a></li>
            <li class="link"><a href="#">My fights</a></li>
            <li class="link"><a href="#">My tickets</a></li>
            <li class="link"><a href="#">Feedback</a></li>
        </ul>
    </nav>
    <div class="list-tickets">
        <h1 class="ticket-header">Flight Tickets</h1>
        <div class="schedule">
            <h3 class="MACB">Flight ID</h3>
            <h3 class="GIOKHOIHANH">Departure Time</h3>
            <h3 class="GIOHACANH">Arrival Time</h3>
            <h3 class="NGAYKHOIHANH">Departure Date</h3>
            <h3 class="TENHANGVE">Class</h3>
            <h3 class="GIAVE">Ticket Price</h3>
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset($row["MACB"]) && isset($row["NGAYKHOIHANH"]) && isset($row["GIOKHOIHANH"]) && isset($row["GIOHACANH"]) && isset($row["GIAVE"]) && isset($row["TENHANGVE"])) {
                echo '<div class="schedule">';
                echo '<h3 class="MACB">' . $row["MACB"] . '</h3>';
                echo '<h3 class="GIOKHOIHANH">' . $row["GIOKHOIHANH"] . '</h3>';
                echo '<h3 class="GIOHACANH">' . $row["GIOHACANH"] . '</h3>';
                echo '<h3 class="NGAYKHOIHANH">' . $row["NGAYKHOIHANH"] . '</h3>';
                echo '<h3 class="TENHANGVE">' . $row["TENHANGVE"] . '</h3>';
                echo '<h3 class="GIAVE">' . $row["GIAVE"] . '</h3>';
                echo '<button class="buttons-payticket js-buy-ticket">buy ticket</button>';
                echo '</div>';
            } else {
                echo "Some keys are missing in the result set.<br>";
                print_r($row);
            }
        }
        mysqli_close($conn);
        ?>
        <!-- ... -->
    </div>
    </div>
    <div class="modal">
        <div class="modal-container">
            <div class="modal-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                <i class="modal-header-icon ti-bag"></i>
                Tickets
            </header>

            <div class="modal-body">

                <label for="quantity" class="modal-label">
                    <i class="ti-shopping-cart"></i>
                    Tickets,15$ per person
                </label>
                <input id="quantity" type="text" class="modal-input" placeholder="How many?">

                <label for="mail" class="modal-label">
                    <i class="ti-user"></i>
                    Send to
                </label>
                <input id="mail" type="email" class="modal-input" placeholder="Enter email">

                <button id="pay-button">
                    Pay <i class="ti-check"></i>
                </button>

            </div>

            <footer class="modal-footer">
                <p class="modal-help">Need <a href="">help?</a></p>
            </footer>
        </div>



    </div>
    </div>

    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket')
        const modal = document.querySelector('.modal')
        const closes = document.querySelector('.modal-close')
        const modalContainer = document.querySelector('.modal-container')

        function showBuyTickets() {
            modal.classList.add('open')
        }


        for (const buyBtn of buyBtns) {
            buyBtn.addEventListener('click', showBuyTickets)
        }

        function closeBuyTickes() {
            modal.classList.remove('open')
        }

        closes.addEventListener('click', closeBuyTickes)
        modal.addEventListener('click', closeBuyTickes)
        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>

</body>

</html>