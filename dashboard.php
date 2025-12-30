<?php
session_start();

/* Session protection */
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

/* Read theme cookie */
$theme = $_COOKIE['theme'] ?? "light";

/* Apply theme styles */
$bgColor   = ($theme === "dark") ? "#1e1e1e" : "#ffffff";
$textColor = ($theme === "dark") ? "#ffffff" : "#000000";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body {
            background-color: <?= $bgColor ?>;
            color: <?= $textColor ?>;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: <?= $textColor ?>;
            font-weight: bold;
        }

        .box {
            border: 1px solid <?= $textColor ?>;
            padding: 20px;
            width: 60%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>🎓 Student Dashboard</h2>

<p>Welcome, <strong><?= htmlspecialchars($_SESSION['name']) ?></strong></p>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="preference.php">Change Theme</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="box">
    <h3>Portal Information</h3>
    <p>You are logged in using <strong>session-based authentication</strong>.</p>
    <p>Your theme preference is stored using <strong>cookies</strong>.</p>
</div>

</body>
</html>
