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
    <title>Home - Cinema Online Booking</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
            transition: background-color 0.3s;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s, background-color 0.3s;
        }

        nav ul li a:hover {
            color: #ff9900;
            background-color: #444;
            padding: 0.5em;
            border-radius: 5px;
        }

        .intro, .features {
            text-align: center;
            padding: 50px 20px;
            background-color: white;
            margin: 20px;
            border-radius: 10px;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1s forwards;
        }

        .features {
            animation-delay: 0.5s;
        }

        .intro h2, .features h3 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .intro p, .features ul {
            font-size: 1.2em;
            color: #666;
        }

        .features ul {
            list-style-type: none;
            padding: 0;
        }

        .features ul li {
            margin: 10px 0;
        }

        .features ul li a {
            font-size: 1.2em;
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .features ul li a:hover {
            color: #ff9900;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    
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
        <section class="intro">
            <h2>Welcome to Cinema Online Booking</h2>
            <p>Your one-stop destination for booking movie tickets online. Explore our latest movies, book tickets, and contact us for any queries.</p>
        </section>
        <section class="features">
            <h3>Features</h3>
            <ul>
                <li><a href="movies.php">Browse Now Showing Movies</a></li>
                <li><a href="#">Book Your Tickets</a></li>
                <li><a href="contact.php">Get in Touch</a></li>
            </ul>
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

