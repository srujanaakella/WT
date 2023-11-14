<?php
// Retrieve the name parameter from the GET request
$name = isset($_GET['name']) ? $_GET['name'] : '';

// Perform a check for an existing user with the same name
// Replace this with your actual database connection and query
// The following example assumes you have a 'users' table with a 'name' column
$conn = new mysqli('localhost', 'root', '', 'practice');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User with the same name exists, return details
    $userDetails = $result->fetch_assoc();
    echo json_encode($userDetails);
} else {
    // User does not exist
    echo "false";
}

$conn->close();
?>
