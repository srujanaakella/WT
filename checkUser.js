function submitForm() {
    // Retrieve form data
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var userClass = document.getElementById("class").value;

    // Check if a user with the same name already exists asynchronously
    checkUser(name, function(response) {
        if (response) {
            // User with the same name already exists, display details
            document.getElementById("result").innerHTML = "User with the same name already exists. Details: " + response;
        } else {
            // User does not exist, proceed with registration
            document.getElementById("result").innerHTML = "User registration successful!";
            // You can add code here to send the form data to the server for further processing
        }
    });
}

function checkUser(name, callback) {
    // Use AJAX to check if a user with the same name already exists
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Callback with the response from the server
            callback(xhr.responseText);
        }
    };

    // Replace 'check_user.php' with the server-side script to handle the check
    xhr.open("GET", "process_form.php?name=" + encodeURIComponent(name), true);
    xhr.send();
}
