function uploadFile() {
    var fileInput = document.getElementById("file");
    var file = fileInput.files[0];

    if (file) {
        var formData = new FormData();
        formData.append("file", file);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Successful upload
                    document.getElementById("result").innerHTML = "File uploaded successfully.";
                } else {
                    // Upload failed
                    document.getElementById("result").innerHTML = "Error uploading file.";
                }
            }
        };

        xhr.open("POST", "upload.php", true);
        xhr.send(formData);
    } else {
        document.getElementById("result").innerHTML = "Please select a file.";
    }
}
