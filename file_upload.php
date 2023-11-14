<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);

    // Connect to MySQL database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your database credentials)
    $conn = new mysqli('localhost', 'root', '', 'practice');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database (replace 'your_table' with your table name)
    $sql = "INSERT INTO prac (username, email) VALUES ('$username', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Data has been stored in the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <script>
        function validateForm() {
            var username = document.forms["registrationForm"]["username"].value;

            // Check if the username contains at least one number
            if (!/\d/.test(username)) {
                alert("Username must contain at least one number.");
                return false;
            }

            // Additional validations can be added for email and file upload

            return true;
        }
    </script>
</head>
<body>
    <h2>User Registration Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="registrationForm">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="file">Upload File:</label>
        <input type="file" name="file" accept=".txt, .pdf, .doc"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
