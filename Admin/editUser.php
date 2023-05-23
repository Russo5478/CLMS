<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$stmt = $pdo->prepare("SELECT * FROM users WHERE staff_id = ?");
$stmt->execute([$_POST['id']]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);
?>
