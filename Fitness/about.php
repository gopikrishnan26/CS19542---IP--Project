<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Virtual Fitness Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        }

        #about-section {
            background: url('https://wallpapercave.com/wp/wp5885671.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .about-content {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
        }

        .about-content h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-content p {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-content ul {
            list-style: none;
            padding: 0;
        }

        .about-content ul li {
            margin: 10px 0;
            font-size: 18px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            margin-top: auto;
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
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>

    <!-- About Us Section -->
    <section id="about-section">
        <div class="about-content">
            <h2>About Virtual Fitness Tracker</h2>
            <p>
                Welcome to Virtual Fitness Tracker, your ultimate fitness companion! Our platform is dedicated 
                to helping individuals achieve their fitness goals by providing personalized workout plans, 
                progress tracking, and expert advice. Whether you're a beginner or a seasoned athlete, our 
                platform is designed to cater to your unique fitness needs.
            </p>
            <p>
                Our mission is to promote healthy lifestyles by providing tools and resources to help you stay 
                active and motivated. Join us on a journey to a healthier, fitter you!
            </p>
            <h3>Key Features</h3>
            <ul>
                <li>Personalized workout plans based on your fitness level</li>
                <li>Track your workouts and monitor your progress</li>
                <li>Access to expert fitness advice and tips</li>
                <li>Nutrition plans tailored to your goals</li>
            </ul>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>
</body>
</html>
