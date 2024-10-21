<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Insert user into the database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['login_user'] = $username; // Save username in session
        header("Location: index.php"); // Redirect to home page after signup
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Virtual Fitness Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles for the signup page */
#signup-section {
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
input[type="text"], input[type="password"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensures padding doesn't affect total width */
}

input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
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

/* Footer styles */
footer {
    margin-top: 20px;
}

    </style>
</head>
<body>
    <header>
        <h1>Create an Account</h1>
    </header>

    <section id="signup-section">
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Sign Up</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Virtual Fitness Tracker. All Rights Reserved.</p>
    </footer>
</body>
</html>
