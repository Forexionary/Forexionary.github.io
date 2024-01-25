<?php
// Connect to the database (similar to process_form.php)

// Retrieve messages from the database
$sql = "SELECT * FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row['name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Message: " . $row['message'] . "<br>";
        echo "Timestamp: " . $row['timestamp'] . "<br><br>";
    }
} else {
    echo "No messages found.";
}
?>
