<?php
session_start();

// Path to users.json
$users_file = 'users.json';

// Check if the file exists
if (!file_exists($users_file)) {
    echo "The file does not exist.";
    exit();
}

// Read users from JSON file
$json_content = file_get_contents($users_file);
if ($json_content === false) {
    echo "Failed to read the file.";
    exit();
}

$users = json_decode($json_content, true);

// Check for JSON errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error decoding JSON: ' . json_last_error_msg();
    exit();
}

// Get the login credentials from POST request
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Debugging: Log user input and user data
error_log("Username: " . $username);
error_log("Password: " . $password);
error_log("Users Data: " . print_r($users, true));

// Initialize a flag to check if user is found
$user_found = false;

// Check if the user exists and the password is correct
foreach ($users as $user) {
    if ($user['username'] === $username) {
        $user_found = true;
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Adjust path if necessary
            exit();
        } else {
            echo "Invalid username or password.";
            exit();
        }
    }
}

if (!$user_found) {
    echo "Invalid username or password.";
}
?>
