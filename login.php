<?php
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

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            setcookie('isLoggedIn', 'true', time() + (86400 * 30), "/"); // 30 days
            header("Location: home.php");
        } else {
            echo "Invalid password. <a href='login.html'>Try again</a>";
        }
    } else {
        echo "No user found with that username. <a href='register.html'>Register here</a>";
    }
}

$conn->close();
?>
