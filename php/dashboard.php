<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 1rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: #555;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #777;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 1rem;
            padding: 1rem;
            text-align: center;
            transition: transform 0.2s ease;
            flex: 1 1 calc(50% - 2rem);
            max-width: calc(50% - 2rem);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .card h3 {
            margin: 1rem 0;
            font-size: 1.5rem;
            color: #333;
        }

        .card p {
            color: #666;
        }

        .card a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            color: #fff;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <nav>
            <ul>
                <li><a href="../visual_acuity_test.html">Eye Test 1</a></li>
                <li><a href="../color_vision_test.html">Eye Test 2</a></li>
                <li><a href="../contrast_sensitivity.html">Eye Test 3</a></li>
                <li><a href="../dynamic_visual_acuity_test.html">Eye Test 4</a></li>
                <li><a href="../index.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="card">
            <img src="../images/pic1.jpg" alt="Eye Test 1">
            <h3>Eye Test 1</h3>
            <p>Test your eyesight with our first eye test. Click below to start.</p>
            <a href="../visual_acuity_test.html">Start Eye Test 1</a>
        </div>
        <div class="card">
            <img src="../images/pic2.jpg" alt="Eye Test 2">
            <h3>Eye Test 2</h3>
            <p>Try out our second eye test for a more detailed examination.</p>
            <a href="../color_vision_test.html">Start Eye Test 2</a>
        </div>
        <div class="card">
            <img src="../images/pic3.jpg" alt="Eye Test 3">
            <h3>Eye Test 3</h3>
            <p>Complete our third eye test to get comprehensive results.</p>
            <a href="../contrast_sensitivity.html">Start Eye Test 3</a>
        </div>
        <div class="card">
            <img src="../images/pic4.jpg" alt="Eye Test 4">
            <h3>Eye Test 4</h3>
            <p>Our fourth eye test offers a new way to check your vision.</p>
            <a href="../dynamic_visual_acuity_test.html">Start Eye Test 4</a>
        </div>
    </div>
</body>
</html>
