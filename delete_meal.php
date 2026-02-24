<?php
include('connection.php');
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get meal ID from URL
    $meal_id = $_GET['id'];
    
    // Check if the meal belongs to the logged-in user
    $user_id = $_SESSION['id'];
    
    // Delete meal query
    $query = "DELETE FROM meals WHERE id = '$meal_id' AND user_id = '$user_id'";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Meal deleted successfully!');</script>";
        echo "<script>window.location.href='view_meal.php';</script>";  // Redirect to the meals view page
    } else {
        echo "<script>alert('Failed to delete meal.');</script>";
        echo "<script>window.location.href='view_meal.php';</script>";  // Redirect back if deletion fails
    }
} else {
    echo "<script>alert('Invalid meal ID!');</script>";
    echo "<script>window.location.href='view_meal.php';</script>";  // Redirect back to meals view
}
?>
