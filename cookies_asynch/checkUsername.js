function checkUsernameAvailability() {
    var username = document.getElementById("username").value;

    if (username.trim() !== "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("usernameAvailability").innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", "check_username.php?username=" + encodeURIComponent(username), true);
        xhr.send();
    } else {
        document.getElementById("usernameAvailability").innerHTML = "";
    }
}

function registerUser() {
    // Implement the registration logic here, e.g., using AJAX to send data to the server
    var registrationResult = document.getElementById("registrationResult");
    registrationResult.innerHTML = "Registration logic will go here.";
}
