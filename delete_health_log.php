<?php
// Include the database connection
include('connection.php');
session_start();

// Check if the 'id' parameter is set and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $log_id = $_GET['id'];

    // Prepare the DELETE SQL query to remove the record
    $sql = "DELETE FROM HealthData WHERE EntryID = '$log_id' AND UserID = '".$_SESSION['id']."'";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        // If the query was successful, redirect back to the health logs page with a success message
        echo "<script>alert('Health log deleted successfully.');</script>";
        echo "<script>window.location.href='manage_record.php';</script>";  // Redirect to the page that lists the logs
    } else {
        // If there was an error, show an alert
        echo "<script>alert('Error deleting record: " . $con->error . "');</script>";
        echo "<script>window.location.href='manage_record.php';</script>";
    }
} else {
    // If 'id' is not valid, redirect to the health logs page
    echo "<script>window.location.href='manage_record.php';</script>";
}
?>
