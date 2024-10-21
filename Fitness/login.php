<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with your database query to verify the user
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Example login.php code
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['login_user'] = $row['username']; // Save username in session
    $_SESSION['user_id'] = $row['user_id']; // Save user ID in session
    header("Location: index.php");
}
 else {
        $error = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Virtual Fitness Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles for the login page */
#login-section {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

/* Input styles */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensures padding doesn't affect total width */
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Button styles */
button {
    width: 100%;
    padding: 10px;
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

/* Error message styles */
.error {
    color: red;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;
}

    </style>
</head>
<body>
    <header>
        <h1>Login to Virtual Fitness Tracker</h1>
    </header>

    <section id="login-section">
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>
</body>
</html>
