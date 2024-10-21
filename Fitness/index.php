<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Fitness Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        nav ul li a:hover {
            color: #d1d1d1;
        }

        section {
            padding: 40px 20px;
            text-align: center;
            flex: 1;
        }

        #home-section {
            background: url('https://wallpapercave.com/wp/wp5885671.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .welcome-message {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }

        .welcome-message h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .welcome-message p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .welcome-message button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .welcome-message button:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Virtual Fitness Tracker</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="work.php">Workout</a></li>
                <li><a href="track_workout.php">Track Workout</a></li>
                <li>
            <?php if (isset($_SESSION['login_user'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login / Sign In</a>
                <a href="signup.php">Sign Up</a> <!-- Sign Up link added -->
            <?php endif; ?>
        </li>
            </ul>
        </nav>
    </header>

    <!-- Home Section -->
    <section id="home-section">
        <div class="welcome-message">
            <h2>Welcome to Your Personal Fitness Journey</h2>
            <p>Set goals, track progress, and get personalized workout plans!</p>
            <button onclick="window.location.href='workout.php'">Start Workout</button>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>
</body>
</html>
