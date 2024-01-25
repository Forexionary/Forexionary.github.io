<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set up your database connection
    $servername = "localhost:3307"; // Replace with your server and port
    $username = "root";
    $password = "";
    $dbname = "form_messages";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Success - the data has been inserted
        echo "Message sent successfully. Thank you!";
    } else {
        // Error - something went wrong
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect back to the form if accessed directly
    header("Location: contact.html");
    exit;
}
?>
