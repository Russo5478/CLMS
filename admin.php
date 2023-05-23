<?php

session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Redirect back to the login page if the user is not logged in
    header("Location: index.html");
    exit();

}

else {
    $username = $_SESSION['username'];
    $staffid = $_SESSION['userid'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <img src="assets/imgs/user.png" alt="">
                <div>
                    <h3><?php echo $username; ?></h3>
                    <small><?php echo $staffid; ?></small>
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
                        <a href="" class="tab active"><span class="fa fa-dashboard"></span>
                        <span>Dashboard</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="Admin.html#computerlab-content"><span class="fa fa-building"></span>
                        <span>Computer Labs</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="Admin.html#reports-section"><span class="fa fa-book"></span>
                        <span>Reports</span></a>
                    </li>
    
                    <li>
                        <a class="tab" href="Admin.html#accounts-section"><span class="fa fa-user"></span>
                        <span>Accounts</span></a>
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="main-content">
            <div id="dashboard-contents" class="tab-content active">
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1>200</h1>
                            <span>Computers</span>
                        </div>
                        <div>
                            <div class="fa fa-laptop fa-2x"></div>
                        </div>
                    </div>
    
                    <div class="card-single">
                        <div>
                            <h1>15</h1>
                            <span>Computer Labs</span>
                        </div>
                        <div>
                            <div class="fa fa-home fa-2x"></div>
                        </div>
                    </div>
    
                    <div class="card-single">
                        <div>
                            <h1>2</h1>
                            <span>Issues</span>
                        </div>
                        <div>
                            <div class="fa fa-book fa-2x"></div>
                        </div>
                    </div>
    
                    <div class="card-single">
                        <div>
                            <h1>1</h1>
                            <span>Computers</span>
                        </div>
                        <div>
                            <div class="fa fa-laptop fa-2x"></div>
                        </div>
                    </div>
    
                </div>
            </div>

            <div id="computerlab-content" class="tab-content">
                <p>1hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>2hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>3hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>4hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>5hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>6hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>7hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>8hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>9hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>10hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
                <p>11hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjj</p>
            </div>

            <div id="reports-section" class="tab-content">
            </div>

            <div id="accounts-section" class="tab-content">
            </div>
        </div>
    </div>
</body>

<script>
    const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-content');

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    // Remove active class from all tabs and content sections
    tabs.forEach(tab => tab.classList.remove('active'));
    tabContents.forEach(content => content.classList.remove('active'));
    
    // Add active class to clicked tab and corresponding content section
    tab.classList.add('active');
    const target = tab.getAttribute('href');
    document.querySelector(target).classList.add('active');
  });
});
</script>
</html>
