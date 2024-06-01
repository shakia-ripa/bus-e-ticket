<?php
// Retrieve data sent via POST
include 'db-connection.php';
$postData = json_decode(file_get_contents('php://input'), true);

// Extract data from the POST request
$name = $postData['name'];
$email = $postData['email'];
$phone = $postData['phone'];
$paid = $postData['paid'];


// Prepare SQL statement to insert data into a table
$sql = "INSERT INTO tickets (name, email, phone, paid) VALUES (?, ?, ?, ?)";


// Prepare and bind parameters to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $paid);

// Execute the statement
if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
