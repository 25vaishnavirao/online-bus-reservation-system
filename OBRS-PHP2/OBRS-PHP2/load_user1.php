<?php
// Load configuration file or establish database connection
include 'db_connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the users table
$sql = "SELECT b.ref_no, b.name, b.quantity, s.departure_time, s.status 
        FROM scheduled_list s
        INNER JOIN booked b ON s.id = b.schedule_id";
$result = $conn->query($sql);

$data = array(); // Initialize an array to store the fetched data

if ($result->num_rows > 0) {
    // Fetch associative array of the result rows
    while ($row = $result->fetch_assoc()) {
        // Push each row to the data array
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Output the data as JSON
echo json_encode($data);
?>
