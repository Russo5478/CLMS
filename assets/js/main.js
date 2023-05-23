function loadContent(url) {
  $.ajax({
    url: url,
    type: "GET",
    success: function (data) {
      $("#other").html(data);
    }
  });
}

function removeOverlay() {
  var overlay = document.querySelector('.overlay');
  overlay.style.display = 'none';
}

$('#addUserForm').submit(function (event) {
  event.preventDefault();

  var formData = $(this).serialize();

  $.ajax({
    url: 'addUser.php',
    type: 'POST',
    data: formData,
    success: function (response) {
      // Clear the form fields
      $('#addUserForm')[0].reset();

      // Display a success message or perform any other actions
      alert('Data saved successfully!');
    }
  });
  removeOverlay();
});

var confirmDelete = true; // Variable to track confirmation status

$(document).on('click', '.delete-link', function (e) {
  e.preventDefault(); // Prevent the default link behavior
  e.stopPropagation(); // Stop event propagation

  var staffId = $(this).data('staff-id');
  if (confirmDelete && confirm("Are you sure you want to delete this user?")) {
    confirmDelete = false; // Set confirmation status to false to avoid double prompts
    $.ajax({
      url: 'deleteUser.php',
      type: 'POST',
      data: { id: staffId },
      success: function (response) {
        // Handle the success response if needed
        alert('User deleted successfully.');
        location.reload();
      },
      complete: function () {
        confirmDelete = true; // Set confirmation status back to true after the request is complete
      }
    });
  }
});

// ---------------------------------------------------------------------------------
var confirmActivate = true;

$(document).on('click', '.activate-user', function (e) {
  e.preventDefault(); // Prevent the default link behavior
  e.stopPropagation(); // Stop event propagation

  var staffId = $(this).data('staff-id');
  if (confirmActivate && confirm("Are you sure you want to activate this user account?")) {
    confirmActivate = false; // Set confirmation status to false to avoid double prompts
    $.ajax({
      url: 'activateUser.php',
      type: 'POST',
      data: { id: staffId },
      success: function (response) {
        // Handle the success response if needed
        alert('User account activated successfully.');
        location.reload();
      },
      complete: function () {
        confirmActivate = true; // Set confirmation status back to true after the request is complete
      }
    });
  }
});


// -----------------------------------------------------------------------------------
var confirmSuspend = true; // Declare confirmSuspend as a global variable

$(document).on('click', '.suspend-user', function (f) {
  f.preventDefault(); // Prevent the default link behavior
  f.stopPropagation(); // Stop event propagation

  var staffId = $(this).data('staff-id');
  if (confirmSuspend && confirm("Are you sure you want to suspend this user account?")) {
    confirmSuspend = false; // Set confirmation status to false to avoid double prompts
    $.ajax({
      url: 'suspendUser.php',
      type: 'POST',
      data: { id: staffId },
      success: function (response) {
        // Handle the success response if needed
        alert('User account suspended successfully.');
        location.reload();
      },
      complete: function () {
        confirmSuspend = true; // Set confirmation status back to true after the request is complete
      }
    });
  }
});


var editModal = document.querySelector('.modal-content');

$(document).on('click', '.edit-user', function (s) {
  s.preventDefault();

  editModal.style.display = 'flex';

  var staffId = $(this).data('staff-id');

  $.ajax({
    url: 'editUser.php',
    type: 'POST',
    data: { id: staffId },
    success: function (response) {
      var staffID = response.staff_id;
      var oldPassword = response.staff_password;
      var oldNames = response.Names;
      var oldAccount = response.is_admin;
      var oldTelephone = response.Telephone;
      var oldExpiry = response.expiry_date;

      var selectOption = document.querySelector('#selectOption');
      if (oldAccount == 1) {
        selectOption.value = 'Administrator';
      } else if (oldAccount == 0) {
        selectOption.value = 'User';
      }

      $('#editUserForm #fullName').val(oldNames);
      $('#editUserForm #tel').val(oldTelephone);
      $('#editUserForm #xpDate').val(oldExpiry);
    }
  });
});

$(document).on('click', '#editUserSaveBtn', function (event) {
  event.preventDefault();

  var editUserForm = document.getElementById('editUser');

  // Create a new FormData object and pass the form element
  var formData = new FormData(editUserForm);

  // Fetch options
  var options = {
    method: 'POST',
    body: formData
  };

  fetch('saveEdits.php', options)
    .then(response => response.json())
    .then(data => {
      // Access individual data from the JSON response
      console.log(data.fullName);
    })
    .catch(error => {
      // Handle any errors
    });

  editModal.style.display = 'none';

});

// Function to populate the edit form fields with user data
function populateEditForm(userData) {
  // Update the form fields with the user data
  $('#editUserForm #fullName').val(userData.fullName);
  $('#editUserForm #staffId').val(userData.staffId);
  // ... Populate other form fields

  // Attach event listener for form submission
  $('#editUserForm').on('submit', function (p) {
    p.preventDefault();
    // Handle the form submission to update the user data
    updateUser($(this).serialize());
  });
}

// Function to update the user data
function updateUser(formData) {
  $.ajax({
    url: 'updateUser.php',
    type: 'POST',
    data: formData,
    success: function (response) {
      // Handle the success response if needed
      alert('User data updated successfully.');
      $('#editUserModal').hide();
      refreshTable(); // Refresh the table data
    }
  });
}

// Function to populate the edit form with user data
function populateEditForm(userData) {
  // Populate the form fields here based on the userData object
  document.getElementById('fullName').value = userData.fullName;
  document.getElementById('changePassword').value = userData.changePassword;
  document.getElementById('institution').value = userData.institution;
  document.getElementById('accountType').value = userData.accountType;
  document.getElementById('phoneNumber').value = userData.phoneNumber;
  document.getElementById('accountExpiryDate').value = userData.accountExpiryDate;
}

$(document).on('click', '.close', function (e) {
  editModal.style.display = 'none';
});
