<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}
$username = $_SESSION['username'];

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "cinema_booking";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$current_time = date('Y-m-d H:i:s');

$sql = "SELECT * FROM bookings WHERE username='$username' AND time > '$current_time'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Online Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Cinema Online Booking</h1>
    <nav>
        <ul class="nav-menu">
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
        <section class="movies">
            <h2>Your Bookings</h2>
            <div class="movies-grid">
                <div class="movie-card" data-description="The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.">
                    <div class="movie-image">
                        <img src="https://m.media-amazon.com/images/I/51NiGlapXlL._AC_.jpg" alt="The Godfather">
                        <div class="overlay">
                            <div class="movie-description"></div>
                        </div>
                    </div>
                    <h3>The Godfather</h3>
                    <p>Price: $10</p>
                    <form action="book.php" method="post">
                        <input type="hidden" name="movie" value="The Godfather">
                        <input type="hidden" name="price" value="10">
                        <label for="time">Time Slot:</label>
                        <select id="time" name="time" required>
                            <option value="2024-06-01 14:00">June 1, 2024, 2:00 PM</option>
                            <option value="2024-06-01 18:00">June 1, 2024, 6:00 PM</option>
                            <option value="2024-06-02 14:00">June 2, 2024, 2:00 PM</option>
                        </select>
                        <label for="tickets">Tickets:</label>
                        <input type="number" id="tickets" name="tickets" min="1" max="10" required>
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="movie-card" data-description="When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.">
                    <div class="movie-image">
                        <img src="https://m.media-amazon.com/images/I/51EG732BV3L._AC_.jpg" alt="The Dark Knight">
                        <div class="overlay">
                            <div class="movie-description"></div>
                        </div>
                    </div>
                    <h3>The Dark Knight</h3>
                    <p>Price: $12</p>
                    <form action="book.php" method="post">
                        <input type="hidden" name="movie" value="The Dark Knight">
                        <input type="hidden" name="price" value="12">
                        <label for="time">Time Slot:</label>
                        <select id="time" name="time" required>
                            <option value="2024-06-01 16:00">June 1, 2024, 4:00 PM</option>
                            <option value="2024-06-01 20:00">June 1, 2024, 8:00 PM</option>
                            <option value="2024-06-02 16:00">June 2, 2024, 4:00 PM</option>
                        </select>
                        <label for="tickets">Tickets:</label>
                        <input type="number" id="tickets" name="tickets" min="1" max="10" required>
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="movie-card" data-description="A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.">
                    <div class="movie-image">
                        <img src="https://m.media-amazon.com/images/I/51v5ZpFyaFL._AC_.jpg" alt="Inception">
                        <div class="overlay">
                            <div class="movie-description"></div>
                        </div>
                    </div>
                    <h3>Inception</h3>
                    <p>Price: $15</p>
                    <form action="book.php" method="post">
                        <input type="hidden" name="movie" value="Inception">
                        <input type="hidden" name="price" value="15">
                        <label for="time">Time Slot:</label>
                        <select id="time" name="time" required>
                            <option value="2024-06-01 15:00">June 1, 2024, 3:00 PM</option>
                            <option value="2024-06-01 19:00">June 1, 2024, 7:00 PM</option>
                            <option value="2024-06-02 15:00">June 2, 2024, 3:00 PM</option>
                        </select>
                        <label for="tickets">Tickets:</label>
                        <input type="number" id="tickets" name="tickets" min="1" max="10" required>
                        <button type="submit">Book Now</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Cinema Online Booking. All rights reserved.</p>
    </footer>

    <script>
        // Show description on hover
        document.querySelectorAll(".movie-card").forEach(card => {
            card.addEventListener("mouseover", () => {
                const description = card.getAttribute("data-description");
                const descriptionElement = card.querySelector(".movie-description");
                descriptionElement.textContent = description;
                descriptionElement.classList.add('show');
            });
            card.addEventListener("mouseout", () => {
                const descriptionElement = card.querySelector(".movie-description");
                descriptionElement.classList.remove('show');
            });
        });

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

<?php
$conn->close();
?>
