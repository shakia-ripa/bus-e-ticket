<?php
header("Access-Control-Allow-Origin: *"); // Allow any domain to access this resource
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods

$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "bus-schedules"; // Change if necessary

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM bus_schedules";
$result = $conn->query($sql);

$busSchedules = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $busSchedules[] = $row;
    }
}

// Close the connection
$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($busSchedules);
?>
