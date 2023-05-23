<?php
session_start();

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

$accounts_query = $pdo->prepare("SELECT * FROM users");
$accounts_query->execute();
$accounts_data = $accounts_query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../assets/js/main.js"></script>
    <link rel="stylesheet" href="../resources/admin.css">
    <link rel="stylesheet" href="../assets/css/adminAccounts.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Control Panel</title>
</head>

<body>
    <div class="main-content">
        <h2>Create, Edit, Delete and Suspend Accounts</h2>
        <div id="accounts-contents" class="tab-content active">
            <div id="accountsTitle">
                <div id="filterSearch">
                    <form method="GET" action="">
                        <select name="filter" id="filterSelect">
                            <option value="">All</option>
                            <?php
                            // Retrieve the options from the database
                            $filter_query = $pdo->prepare("SELECT DISTINCT is_admin FROM users");
                            $filter_query->execute();
                            $filter_data = $filter_query->fetchAll(PDO::FETCH_ASSOC);

                            // Generate the <option> elements dynamically
                            foreach ($filter_data as $filter) {
                                $optionValue = $filter['is_admin'];
                                $optionText = ($optionValue == 1) ? 'Administrators' : 'Users';
                                echo "<option value=\"$optionValue\">$optionText</option>";
                            }
                            ?>
                        </select>
                        <input type="text" name="search" placeholder="Search by Name">
                        <button type="submit" , id="applyBtn">Apply Filter</button>
                    </form>
                </div>
                <button type="button" class="btnAdd" id="addAccount">
                    Add Account
                </button>
            </div>

            <div id="accountsTable">
                <table>
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Account Type</th>
                            <th>Account Expiry</th>
                            <th>Account Status</th>
                            <th>Institution</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($accounts_data as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['staff_id'] . "</td>";
                            echo "<td>" . $row['Names'] . "</td>";
                            echo "<td>" . ($row['is_admin'] == 1 ? 'Administrator' : 'User') . "</td>";
                            echo "<td>" . $row['expiry_date'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['Institution'] . "</td>";
                            echo "<td>";
                            echo "<a href='javascript:void(0);' class='edit-user' id='edituse' data-staff-id='" . $row['staff_id'] . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>";
                            echo "<a href='javascript:void(0);' class='delete-link' data-staff-id='" . $row['staff_id'] . "' title='Delete'><i class='fa fa-trash-o'></i></a>";
                            echo "<a href='javascript:void(0);' class='activate-user' data-staff-id='" . $row['staff_id'] . "' title='Activate'><i class='fa fa-play-circle-o'></i></a>";
                            echo "<a href='javascript:void(0);' class='suspend-user' data-staff-id='" . $row['staff_id'] . "' title='Suspend'><i class='fa fa-pause-circle-o'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="overlay">
        <div class="modal">
            <div id="form-container" class="container">
                <header>Registration Form</header>
                <form action="addUser.php" class="form" method="POST" id="addUserForm">
                    <div class="input-box">
                        <label>Full Name*</label>
                        <input type="text" placeholder="Enter full name" required name="names" />
                    </div>
                    <div class="input-box">
                        <label>Staff ID*</label>
                        <input type="text" placeholder="Enter staff ID" required name="staffid" />
                    </div>

                    <div class="input-box">
                        <label>Create password*</label>
                        <input type="text" placeholder="Create new password" required name="pass" />
                    </div>

                    <div class="input-box">
                        <label>Institution Initials*</label>
                        <input type="text" placeholder="Enter institution initials" required name="institution" />
                    </div>

                    <div class="input-box">
                        <label>Account Type*</label>
                        <select name="filter">
                            <option value="Administrator">Administrator</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Phone Number*</label>
                            <input type="number" placeholder="Enter phone number" required name="telephone" />
                        </div>
                        <div class="input-box">
                            <label>Account Expiry Date*</label>
                            <input type="date" placeholder="Enter account expiry date" required name="expiryDates" />
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

        <script>
            var showFormBtn = document.getElementById('addAccount');
            var overlay = document.querySelector('.overlay');

            showFormBtn.addEventListener('click', function() {
                overlay.style.display = 'flex';
            });

            overlay.addEventListener('click', function(event) {
                if (event.target === overlay) {
                    overlay.style.display = 'none';
                }
            });
        </script>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this user?");
            }
        </script>

    </div>

    <div class="modal-content">
        <div class="modal2">
            <div class='container' id="editUserForm">
                <div id='formH'>
                    <span class="close">&times;</span>
                    <h2>Edit User</h2>
                </div>
                <form class="form" id='editUser'>
                    <div class="input-box">
                        <label>Full Name</label>
                        <input id="fullName" type="text" placeholder="Enter full name" required name="names" />
                    </div>

                    <div class="input-box">
                        <label>Change Password</label>
                        <input id="changePassword" type="text" placeholder="Edit password" />
                    </div>

                    <div class="input-box">
                        <label>Account Type</label>
                        <select name="filter" id="selectOption">
                            <option value="Administrator">Administrator</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Phone Number</label>
                            <input id='tel' type="text" placeholder="Enter phone number" required name="telephone" />
                        </div>
                        <div class="input-box">
                            <label>Account Expiry Date</label>
                            <input id='xpDate' type="date" placeholder="Enter account expiry date" required name="expiryDates" />
                        </div>
                    </div>
                    <button type="submit" id='editUserSaveBtn'>Save</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>