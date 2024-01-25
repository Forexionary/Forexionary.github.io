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
    $password = $_POST['password'];

    // Prepare and call the login stored procedure
    $sql = "CALL login('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Login successful. Welcome, " . $username;
    } else {
        $errorMessage = "Login failed: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
