<?php

session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Redirect back to the login page if the user is not logged in
    header("Location: ../index.html");
    exit();

}

else {
    $username = $_SESSION['username'];
    $staffid = $_SESSION['userid'];
    $category = $_SESSION['categ'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <title>Admin Control Panel</title>
</head>

<body>
    <div id="header-section">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fa fa-bars"></span>
                </label>
                KCA LABS
            </h2>

            <div class="user-wrapper">
                <img src="../assets/imgs/user.png" alt="">
                <div>
                    <h3><?php echo $username; ?></h3>
                    <small><?php echo $category; ?></small>
                </div>
            </div>
        </header>
    </div>

    <div id="contents">
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#" onclick="loadContent('dashboard.php');" class="tab active"><span class="fa fa-dashboard"></span>
                        <span>Dashboard</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="#" onclick="loadContent('labs.php');"><span class="fa fa-building"></span>
                        <span>Computer Labs</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="#" onclick="loadContent('reports.php');"><span class="fa fa-book"></span>
                        <span>Reports</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="#" onclick="loadContent('accounts.php');"><span class="fa fa-user"></span>
                        <span>Accounts</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="other"></div>
    </div>
</body>
</html>
