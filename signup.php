<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$port = "3307";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Prepare and call the signup stored procedure
    $sql = "CALL signup('$email', '$username', '', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the login page upon successful signup
        header("Location: loginpage.html");
        exit; // Ensure that no further code is executed after the redirect
    } else {
        $errorMessage = "Signup failed: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
