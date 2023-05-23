<?php
// Retrieve the JSON data from the JavaScript code
$jsonData = file_get_contents('php://input');

// Decode the JSON data into a PHP associative array
$data = json_decode($jsonData, true);

// Access the fullName value
$fullName = $data['fullName'];

// Print the fullName
echo $fullName;
?>
