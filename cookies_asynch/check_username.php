<?php

$conn = new mysqli('localhost','root', '', 'practice');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Check if the username exists in the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<span class='unavailable'>Username not available.</span>";
    } else {
        echo "<span class='available'>Username available.</span>";
    }
}

$conn->close();
?>
