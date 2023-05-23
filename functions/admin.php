<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Control Panel</title>
    <style>
      /* Center the form in the middle of the screen */
      #form-container {
        position: fixed;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        max-width: 400px;
        font-family: 'Open Sans', sans-serif;
        display: none; /* initially hide the form container */
      }

      #form-container h2{
        text-align: center;
      }

      /* Style the form fields */
      input[type=text], select, input[type=date] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-radius: 4px;
        font-size: 15px;
      }
      /* Style the submit button */
      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      label {
        font-size: 15px;
      }

      span {
        position: absolute;
        top: 0;
        right: 0;
        padding-top: 20px;
        padding-right: 30px;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        // show form container on button click
        $('#show-form-btn').click(function() {
          $('#form-container').fadeIn('slow');
        });
      });
    </script>

<script>
  var formContainer;

  document.addEventListener('DOMContentLoaded', function() {
    formContainer = document.getElementById("form-container");
  });

  function hideForm() {
    if (formContainer) {
      formContainer.style.display = "none";
    }
  }
</script>

  </head>
  <body>
    <button id="show-form-btn">Show Form</button>
    <div id="form-container">
      <span>
      <i class="fa fa-times" onclick="hideForm()"></i>
      </span>
      <h2>Enter User Details</h2>
      <form method="post" action="adduser.php">
        <label for="staff-id">Staff ID:</label>
        <input type="text" id="staff-id" name="staff-id" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required>

        <label for="telephone">Telephone:</label>
        <input type="text" id="telephone" name="telephone" required>

        <label for="account-type">Account Type:</label>
        <select id="account-type" name="account-type">
          <option value="admin">Admin</option>
          <option value="other">Other</option>
        </select>

        <label for="date">Account Expiry Date:</label>
        <input type="date" id="date" name="date" required>

        <input type="submit" value="Add User">
      </form>
    </div>
  </body>
</html>
