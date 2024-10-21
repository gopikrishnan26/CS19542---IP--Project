<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['login_user']) || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get user ID from session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['start_workout'])) {
        $workout_title = $_POST['workout_title'];
        $sub_workout_name = $_POST['sub_workout_name'];
        $reference_link = $_POST['reference_link'];
        $start_time = date("Y-m-d H:i:s");

        // Insert sub-workout into the sub_workouts table
        $sql = "INSERT INTO sub_workouts (user_id, workout_title, sub_workout_name, start_time, reference_link) 
                VALUES ('$user_id', '$workout_title', '$sub_workout_name', '$start_time', '$reference_link')";

        if ($conn->query($sql) === TRUE) {
            echo "Workout started!";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    if (isset($_POST['end_workout'])) {
        $sub_workout_id = $_POST['sub_workout_id'];
        $end_time = date("Y-m-d H:i:s");

        // Update sub-workout end time
        $sql = "UPDATE sub_workouts SET end_time = '$end_time' WHERE sub_workout_id = '$sub_workout_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Workout completed!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Workouts - Virtual Fitness Tracker</title>
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

        .workout-box {
            background-color: #fff;
            padding: 20px;
            width: 90%;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sub-workout {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        #timer {
            font-size: 24px;
            margin: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Track Workouts</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="workout.php">Workout</a></li>
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

    <section id="track-workouts-section">
        <h2>Your Tracked Workouts</h2>
        <div class="workout-box">
            <h3>Workout Title: Chest Press</h3>
            <div class="sub-workout">
                <h4>Sub Workout: Incline Chest Press</h4>
                <form method="POST" id="workoutForm">
                    <input type="hidden" name="sub_workout_id" value="1"> <!-- Example sub_workout_id -->
                    <button type="submit" name="start_workout" id="startBtn">Start Workout</button>
                    <button type="submit" name="end_workout" id="endBtn" disabled>End Workout</button>
                </form>
            </div>
        </div>

        <div id="timer">Timer: <span id="timeElapsed">0</span> seconds</div>

        <button onclick="window.location.href='sub_workouts.php'">Add Sub Workouts</button>
    </section>

    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>

    <script>
        let timerInterval;
        let timeElapsed = 0;

        const startButton = document.getElementById('startBtn');
        const endButton = document.getElementById('endBtn');
        const timeDisplay = document.getElementById('timeElapsed');
        const workoutForm = document.getElementById('workoutForm');

        function startTimer() {
            timerInterval = setInterval(() => {
                timeElapsed++;
                timeDisplay.textContent = timeElapsed;
            }, 1000);
        }

        function stopTimer() {
            clearInterval(timerInterval);
        }

        // Start the timer when the start button is clicked
        workoutForm.addEventListener('submit', function (e) {
            const formAction = e.submitter.name; // Get the button that triggered the submit

            if (formAction === 'start_workout') {
                e.preventDefault();
                startTimer();
                startButton.disabled = true; // Disable start button
                endButton.disabled = false;  // Enable end button
            } else if (formAction === 'end_workout') {
                stopTimer();
            }
        });
    </script>
</body>
</html>
