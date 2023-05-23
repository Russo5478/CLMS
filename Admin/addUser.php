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

date_default_timezone_set('Africa/Nairobi');
$todays_date = date('Y-m-d');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['names'];
    $staff = $_POST['staffid'];
    $password = $_POST['pass'];
    $institution = strtoupper($_POST['institution']);
    $phone = $_POST['telephone'];
    $expDate = $_POST['expiryDates'];
    $isAdmin = ($_POST['filter'] == 'Administrator' ? 1 : 0);
    $status = 'active';

    $hashed_password = md5($password);

    // Prepare and execute the SQL query to insert data
    $stmt = $pdo->prepare("INSERT INTO users (staff_id, staff_password, Names, date_created, expiry_date, Institution, is_admin, Telephone, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$staff, $hashed_password, $name, $todays_date, $expDate, $institution, $isAdmin, $phone, $status]);
}
exit();

?>
