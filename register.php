<?php
require_once "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $student_id = trim($_POST['student_id']);
    $full_name  = trim($_POST['full_name']);
    $password_hash   = ($_POST['password_hash']);

    if (empty($student_id) || empty($full_name) || empty($password_hash)) {
        die("All fields are required.");
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO students (student_id, full_name, password_hash)
                VALUES (:student_id, :full_name, :password_hash)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':student_id' => $student_id,
            ':full_name'  => $full_name,
            ':password_hash'   => $password_hash
        ]);

        echo "Student registered successfully!";

    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>

<h2>Student Registration</h2>
<form method="post">
    Student ID: <input type="text" name="student_id" required><br><br>
    Full Name: <input type="text" name="full_name" required><br><br>
    Password: <input type="password" name="password_hash" required><br><br>
    <button type="submit">Register</button>
</form>
