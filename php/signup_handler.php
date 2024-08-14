<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        die('Passwords do not match.');
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userData = array(
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    );

    $jsonFile = 'users.json';
    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        $users = json_decode($jsonContent, true);
    } else {
        $users = array();
    }

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            die('Username already exists.');
        }
        if ($user['email'] === $email) {
            die('Email already exists.');
        }
    }

    $users[] = $userData;
    $newJsonContent = json_encode($users, JSON_PRETTY_PRINT);
    if (file_put_contents($jsonFile, $newJsonContent) === false) {
        die('Failed to write to JSON file.');
    }

    // Display success message and redirect
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .message {
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "../index.html";
        }, 3000); // Redirect after 3 seconds
    </script>
</head>
<body>
    <div class="message">
        <h1>Registration Successful!</h1>
        <p>You will be redirected to the landing page shortly.</p>
        <a href="../index.html" class="btn">Go to Landing Page</a>
    </div>
</body>
</html>';
} else {
    die('Invalid request method.');
}
?>
