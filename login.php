<?php
session_start();
require_once "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $student_id = trim($_POST['student_id']);
    $password   = $_POST['password'];

    $sql = "SELECT password, name FROM students WHERE student_id = :student_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':student_id' => $student_id
    ]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $user['name'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Student ID or Password!";
    }
}
?>

<h2>Login</h2>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="post">
    Student ID:
    <input type="text" name="student_id" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>
