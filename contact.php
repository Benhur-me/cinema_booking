<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Cinema Online Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Cinema Online Booking</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="#">Booking</a></li>
                <li><a href="contact.php">Contact Us</a></li>

                <div class="welcome-message">
                <?php echo "Welcome, " . htmlspecialchars($username); ?>
            </div>
            
                <li id="auth-link"></li>
            </ul>
            
        </nav>
    </header>
    <main>
        <section class="contact">
            <h2>Contact Us</h2>
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Cinema Online Booking. All rights reserved.</p>
    </footer>
    <script>
        const isLoggedIn = document.cookie.includes('isLoggedIn=true');
        const authLink = document.getElementById('auth-link');
        if (isLoggedIn) {
            authLink.innerHTML = '<a href="logout.php">Logout</a>';
        } else {
            authLink.innerHTML = '<a href="register.html">Register</a> <a href="login.html">Login</a>';
        }
    </script>
</body>
</html>
