<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workouts - Virtual Fitness Tracker</title>
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

        #workouts-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .workout-box {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .workout-box:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .workout-title {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .workout-buttons button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .workout-buttons button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        /* Animation for the workout section */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .workout-box {
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Button hover animation */
        button:hover {
            transform: scale(1.1);
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

    <!-- Workouts Section -->
    <section id="workouts-section">
        <!-- Workout 1 -->
        <div class="workout-box">
            <h3 class="workout-title">Chest Press</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Chest Press')">More Details</button>
                <button onclick="startWorkout('Chest Press')">Start Workout</button>
            </div>
        </div>

        <!-- Workout 2 -->
        <div class="workout-box">
            <h3 class="workout-title">Leg Press</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Leg Press')">More Details</button>
                <button onclick="startWorkout('Leg Press')">Start Workout</button>
            </div>
        </div>

        <!-- Workout 3 -->
        <div class="workout-box">
            <h3 class="workout-title">Lat Pulldown</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Lat Pulldown')">More Details</button>
                <button onclick="startWorkout('Lat Pulldown')">Start Workout</button>
            </div>
        </div>

        <!-- Workout 4 -->
        <div class="workout-box">
            <h3 class="workout-title">Treadmill</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Treadmill')">More Details</button>
                <button onclick="startWorkout('Treadmill')">Start Workout</button>
            </div>
        </div>

        <!-- Workout 5 -->
        <div class="workout-box">
            <h3 class="workout-title">Bicep Curl</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Bicep Curl')">More Details</button>
                <button onclick="startWorkout('Bicep Curl')">Start Workout</button>
            </div>
        </div>

        <!-- Workout 6 -->
        <div class="workout-box">
            <h3 class="workout-title">Squat Rack</h3>
            <div class="workout-buttons">
                <button onclick="showDetails('Squat Rack')">More Details</button>
                <button onclick="startWorkout('Squat Rack')">Start Workout</button>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>

    <script>
        // Function to show more details (For now, it just logs the workout)
        function showDetails(workout) {
            alert("More details about " + workout + " will be shown here.");
        }

        // Function to start a workout and add it to the track workouts page (For now, it just logs the workout)
        function startWorkout(workout) {
            // Add logic to track workout (you can add it to a database or store it in a session)
            alert(workout + " has been added to your tracked workouts!");
            // This can be extended to actually store in MySQL
        }
    </script>
</body>
</html>
