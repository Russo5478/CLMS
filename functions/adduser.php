<?php

$staffid = $_POST['staff-id'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];
$account_type = $_POST['account-type'];
$expiry_date = $_POST['date'];

print_r($_POST);

if ($account_type == 'admin') {
    $account_type == 1;
}

else {
    $account_type == 0;
}

$hashed_password = md5($password);
date_default_timezone_set('Africa/Nairobi');
$login_time = date('h:i:s');
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

$stmt = $pdo->prepare("INSERT INTO users (staff_id, staff_password, date_created, expiry_date, is_admin, Telephone) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$staffid, $hashed_password, $todays_date, $expiry_date, $account_type, $telephone]);
$succes = $stmt->fetch();

?>
