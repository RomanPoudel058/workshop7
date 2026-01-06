<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['theme'];
    setcookie('theme', $value, time() + 86400 * 30, "/");
    header("Location: dashboard.php");
    exit;
}

$currentTheme = $_COOKIE['theme'] ?? "light";
?>
<!DOCTYPE html>
<html>
<head><title>Preference</title></head>
<body>

<h2>Select Theme</h2>

<form method="post">
    <select name="theme">
        <option value="light" <?= $currentTheme=="light"?"selected":"" ?>>Light Mode</option>
        <option value="dark" <?= $currentTheme=="dark"?"selected":"" ?>>Dark Mode</option>
    </select>
    <br><br>
    <button type="submit">Save</button>
</form>

</body>
</html>