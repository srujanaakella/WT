# WT


how to open php/xampp stuff:

1. open xampp, start apache and mysql
2. save your php file in the local folder of htdocs in xampp (":C/xampp/htdocs")
3. open your browser and run 'http://localhost/your_file_name.php'
4. to run mysql server, open your browser and run 'http://localhost/phpmyadmin'

   // Connect to MySQL database
$conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');
$conn = new mysqli('localhost', 'root', '', 'your_database');

5. create a database with that name and tables

ctrl+space for intellisense on vscode


login and sign up page: https://speedysense.com/create-registration-login-system-php-mysql/
