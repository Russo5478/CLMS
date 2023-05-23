<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Africa/Nairobi');
$todays_date = date('Y-m-d');

// Connect to the database
$host = 'localhost';
$dbname = 'computer_lab';
$username_db = 'root';
$password_db = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username_db, $password_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Check if the request has an "id" parameter
if (isset($_POST['id'])) {
    $staffId = $_POST['id'];

    // Prepare and execute the SQL query to delete the user
    $stmt = $pdo->prepare("UPDATE users SET status = ? WHERE staff_id = ?");
    $stmt->execute(["active", $staffId]);
}
exit();

?>
