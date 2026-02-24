<?php
include('connection.php');  // Include the database connection

session_start();  // Start session

$user_id = $_SESSION['id'];  // Get user_id from GET

// Query to fetch reminders for the logged-in user
$query = "SELECT * FROM Reminders WHERE UserID = '$user_id'";
$result = mysqli_query($con, $query);

// Initialize an array to store events
$events = array();

// Loop through the reminders data and prepare it for FullCalendar
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = array(
        'title' => $row['Type'],  // Reminder type (e.g., Medication, Workout)
        'start' => $row['Date'] . 'T' . $row['Time'],  // Combine Date and Time into the correct format for FullCalendar
        'status' => $row['Status'],  // Reminder status (Completed, Pending, etc.)
    );
}

// Return the events as JSON
echo json_encode($events);
?>
