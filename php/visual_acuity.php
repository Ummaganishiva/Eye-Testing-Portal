<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Acuity Test - Online Eye Testing Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Visual Acuity Test</h1>
        <nav>
            <ul>
                <li><a href="php/dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Instructions</h2>
        <p>Follow the instructions below to complete the visual acuity test.</p>
        <!-- Add your test content here -->
    </section>
    <footer>
        <p>&copy; 2024 Online Eye Testing Portal. All rights reserved.</p>
    </footer>
</body>
</html>
