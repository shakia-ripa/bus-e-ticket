<?php

// Include the database connection file
include 'db-connection.php';
header("Access-Control-Allow-Origin: *"); // Allow any domain to access this resource
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods



// Get search parameters
$from = isset($_GET['from']) ? $_GET['from'] : '';
$to = isset($_GET['to']) ? $_GET['to'] : '';


$sql = "SELECT * FROM bus_schedules WHERE 1=1";

if ($from != '') {
    $sql .= " AND departureCity = '" . $conn->real_escape_string($from) . "'";
}
if ($to != '') {
    $sql .= " AND arrivalCity = '" . $conn->real_escape_string($to) . "'";
}

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
