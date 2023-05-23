<?php

session_start();

$staffid = $_POST['staffid'];
$password = $_POST['password'];

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

function logUserLogin($pdo, $staff_id){
    date_default_timezone_set('Africa/Nairobi');
    $login_time = date('Y-m-d H:i:s');
    $stmt = $pdo->prepare("INSERT INTO login_log (staff_id, login_time) VALUES (?, ?)");
    $stmt->execute([$staff_id, $login_time]);
}

// Validate the user's credentials
$user_query = $pdo->prepare("SELECT * FROM users WHERE staff_id = ? AND staff_password = ?");
$user_query->execute([$staffid, $hashed_password]);
$user_info = $user_query->fetch();

if ($user_info) {
    $staff_id = $user_info['staff_id'];
    $expiry_date = $user_info['expiry_date'];
    $is_admin = $user_info['is_admin'];
    $status = $user_info['status'];

    if (strtotime($expiry_date) <= strtotime($todays_date)) {
        header("Location: ../index.html?expired=true");
        exit();
    }

    else {
      if ($status == 'active') {
        if ($is_admin == 1) {
          logUserLogin($pdo, $staff_id);
          $_SESSION['isLoggedIn'] = true;
          $_SESSION['username'] = $user_info['Names'];
          $_SESSION['userid'] = $user_info['staff_id'];
          $_SESSION['categ'] = ($user_info['is_admin'] == 1 ? 'Administrator' : 'User');
          header("Location: ../Admin/admin.php");
          exit();
        }
  
        elseif ($is_admin == 0) {
          logUserLogin($pdo, $staff_id);
          $_SESSION['isLoggedIn'] = true;
          $_SESSION['username'] = $user_info['Names'];
          $_SESSION['userid'] = $user_info['staff_id'];
          header("Location: ../otherUser.php");
          exit();
        }
      }

      else {
        echo "suspended";
      }
    }
}

else {
    // Display an error message
    echo 'User not found';
  }
?>
