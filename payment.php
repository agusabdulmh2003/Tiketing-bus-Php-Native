<?php
// payment.php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_id = $_POST['bus_id'];
    $passenger_name = $_POST['passenger_name'];
    $seat_numbers = $_POST['seats'];
    $payment_method = $_POST['payment_method'];

    foreach ($seat_numbers as $seat) {
        $query = "INSERT INTO bookings (bus_id, passenger_name, seat_number) VALUES ('$bus_id', '$passenger_name', '$seat')";
        mysqli_query($conn, $query);
    }

    header("Location: success.php");
    exit();
}
?>
