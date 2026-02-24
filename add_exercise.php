<?php
include('header.php');
include('sidebar.php');
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['id'];
    $exercise_category = $_POST['exercise_category'];
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $calories_burned = $_POST['calories_burned'];
    $timestamp = date('Y-m-d H:i:s');

    $query = "INSERT INTO exercises (user_id, category, name, duration, calories_burned, timestamp) 
              VALUES ('$user_id', '$exercise_category', '$exercise_name', '$duration', '$calories_burned', '$timestamp')";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Exercise logged successfully!');</script>";
        echo "<script>window.location.href='add_exercise.php';</script>";
    } else {
        echo "<script>alert('Error logging exercise!');</script>";
    }
}
?>


    <h2>Log Your Exercise</h2>
    <form method="POST" id="exerciseForm">
        <div class="form-group">
            <label for="exercise_category">Category</label>
            <select class="form-control" id="exercise_category" name="exercise_category" required>
                <option value="" disabled selected> Select Exercise </option>
                <option value="Cardio">Cardio</option>
                <option value="Strength">Strength</option>
                <option value="Yoga">Yoga</option>
                <option value="Stretching">Stretching</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exercise_name">Exercise Name</label>
            <input type="text" class="form-control" id="exercise_name" name="exercise_name" placeholder="Exercise Name" required>
            <div id="exercise-suggestions"></div> <!-- Suggestions will appear here -->
        </div>

        <div class="form-group">
            <label for="duration">Duration (Minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" placeholder="Duration" required>
        </div>

        <div class="form-group">
            <label for="calories_burned">Calories Burned</label>
            <input type="number" class="form-control" id="calories_burned" name="calories_burned" placeholder="Calories Burned" required>
        </div>

        <button type="submit" class="btn btn-primary">Log Exercise</button>
    </form>
</div>
</div>
</div>


<?php include('footer.php'); ?>
