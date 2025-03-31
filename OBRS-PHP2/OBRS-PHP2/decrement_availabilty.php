

<?php
// Connect to your database
include('db_connect.php');

// Check if the ID is provided and not empty
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $schedule_id = $_POST['id'];

    // Query to decrement the availability column
    $update_query = "UPDATE schedule_list SET availability = availability - 1 WHERE id = $schedule_id";

    // Execute the query
    if(mysqli_query($conn, $update_query)) {
        // If the query is successful, return a success message
        echo json_encode(array('status' => 'success', 'message' => 'Availability decremented successfully'));
    } else {
        // If there is an error with the query, return an error message
        echo json_encode(array('status' => 'error', 'message' => 'Error decrementing availability'));
    }
} else {
    // If the ID is not provided or empty, return an error message
    echo json_encode(array('status' => 'error', 'message' => 'Invalid schedule ID'));
}
?>
