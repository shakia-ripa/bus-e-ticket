<?php

include 'db-connection.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leaving_from = $_POST['from'];
    $going_to = $_POST['to'];
    $departing_date = $_POST['departing_date'];

    $sql = "INSERT INTO bus_schedules (leaving_from, going_to, departing_date) VALUES ('$leaving_from', '$going_to', '$departing_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

