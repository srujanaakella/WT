<?php
// Start or resume a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // You can redirect the user to a login page if not logged in
    echo "Error: User not logged in.";
    exit;
}

// Directory to upload files
$uploadDirectory = "uploads/";

// Check if the directory exists, create it if not
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Get the user ID from the session
$userID = $_SESSION['user_id'];

// Increment the count of uploaded files for the user
if (!isset($_SESSION['file_count'])) {
    $_SESSION['file_count'] = 1;
} else {
    $_SESSION['file_count']++;
}

// Generate a unique filename for the uploaded file
$filename = $userID . "_file_" . $_SESSION['file_count'] . "_" . basename($_FILES["file"]["name"]);
$targetFile = $uploadDirectory . $filename;

// Check if the file has been successfully uploaded
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    echo "File uploaded successfully.";
} else {
    echo "Error uploading file.";
}
?>
