<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['username'];
    $movie = $_POST['movie'];
    $tickets = $_POST['tickets'];
    $price = $_POST['price'];
    $time = $_POST['time'];
    $total_cost = $tickets * $price;

    $sql = "INSERT INTO bookings (username, movie, tickets, time, total_cost) VALUES ('$user', '$movie', '$tickets', '$time', '$total_cost')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successful! Total cost: $$total_cost'); window.location.href='movies.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
