<?php
session_start();

/* Session Check */
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

/* Theme Cookie */
$theme = $_COOKIE['theme'] ?? "light";

/* CSS Theme */
if ($theme == "dark") {
    $bg = "black";
    $color = "white";
} else {
    $bg = "white";
    $color = "black";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body {
    background-color: <?= $bg ?>;
    color: <?= $color ?>;
    font-family: Arial;
}
</style>
</head>
<body>

<h2>Welcome <?= $_SESSION['name']; ?></h2>
<p>Student ID: <?= $_SESSION['student_id']; ?></p>

<a href="preference.php">Change Theme</a> |
<a href="logout.php">Logout</a>

</body>
</html>