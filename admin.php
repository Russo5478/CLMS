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
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab-la"></span>CLMS</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="fa fa-dashboard"></span>
                    <span>Dashboard</span></a>
                </li>

                <li>
                    <a href=""><span class="fa fa-building"></span>
                    <span>Computer Labs</span></a>
                </li>

                <li>
                    <a href=""><span class="fa fa-book"></span>
                    <span>Reports</span></a>
                </li>

                <li>
                    <a href=""><span class="fa fa-user"></span>
                    <span>Accounts</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="navigation"></div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fa fa-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="user-wrapper">
                <img src="assets/imgs/user.png" alt="">
                <div>
                    <h4>Admin Account</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
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
        </main>
    </div>
</body>

</html>