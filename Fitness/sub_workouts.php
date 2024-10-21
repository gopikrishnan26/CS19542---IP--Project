<?php
session_start();
include 'db_connect.php';

// Fetch all sub-workouts from the database
$sql = "SELECT * FROM sub_workouts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Workouts - Virtual Fitness Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles for the sub workouts page */
#sub-workouts-section {
    padding: 40px 20px;
    text-align: center;
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 15px;
    border: 1px solid #ccc;
    text-align: left;
}

table th {
    background-color: #4CAF50;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #e0e0e0;
}

/* Button styles for the add action in the table */
button {
    padding: 8px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #45a049;
}

/* Footer styles */
footer {
    margin-top: 20px;
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
    </style>
</head>
<body>
    <header>
        <h1>Sub Workouts</h1>
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

    <section id="sub-workouts-section">
        <h2>Select a Sub Workout to Add</h2>
        <table>
            <tr>
                <th>Workout Title</th>
                <th>Sub Workout Name</th>
                <th>Reference Link</th>
                <th>Add</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['workout_title']; ?></td>
                        <td><?php echo $row['sub_workout_name']; ?></td>
                        <td><a href="<?php echo $row['reference_link']; ?>" target="_blank">Reference Link</a></td>
                        <td>
                            <form method="POST" action="track_workout.php">
                                <input type="hidden" name="workout_title" value="<?php echo $row['workout_title']; ?>">
                                <input type="hidden" name="sub_workout_name" value="<?php echo $row['sub_workout_name']; ?>">
                                <input type="hidden" name="reference_link" value="<?php echo $row['reference_link']; ?>">
                                <button type="submit" name="start_workout">Add</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No sub workouts available.</td>
                </tr>
            <?php endif; ?>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>
</body>
</html>
