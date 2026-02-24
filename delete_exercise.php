<?php
include('connection.php');
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get exercise ID from URL
    $exercise_id = $_GET['id'];
    
    // Check if the exercise belongs to the logged-in user
    $user_id = $_SESSION['id'];
    
    // Delete exercise query
    $query = "DELETE FROM exercises WHERE id = '$exercise_id' AND user_id = '$user_id'";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Exercise deleted successfully!');</script>";
        echo "<script>window.location.href='view_exercise.php';</script>";  // Redirect to the exercises view page
    } else {
        echo "<script>alert('Failed to delete exercise.');</script>";
        echo "<script>window.location.href='view_exercises.php';</script>";  // Redirect back if deletion fails
    }
} else {
    echo "<script>alert('Invalid exercise ID!');</script>";
    echo "<script>window.location.href='view_exercise.php';</script>";  // Redirect back to exercises view
}
?>
