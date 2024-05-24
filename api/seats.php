<?php
// Include the database connection file
include 'db-connection.php';
header("Access-Control-Allow-Origin: *"); // Allow any domain to access this resource
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods


// Step 2: Fetch data from the database
$sql = "SELECT rowName, seatId,busId, isBooked FROM seats";
$result = $conn->query($sql);

// Step 3: Format the fetched data
$seatData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $seatData[] = $row;
    }
}

// Step 4: Send data to client
header('Content-Type: application/json');
echo json_encode($seatData);

// Step 5: Close the connection
$conn->close();
?>
