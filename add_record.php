<?php

include('header.php');
include('sidebar.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_SESSION['id'];  // You can fetch this from session or authentication
    $type = $_POST['type'];
    $description = $_POST['description'];
    $calories = $_POST['calories'] ? $_POST['calories'] : 0;
    $duration = $_POST['duration'] ? $_POST['duration'] : 0;
    $date = date('Y-m-d');  // Current date

    $sql = "INSERT INTO HealthData (UserID, Date, Type, Description, Calories, Duration) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isssii", $userID, $date, $type, $description, $calories, $duration);

    if ($stmt->execute()) {
        echo "<script> alert (' Your data has been submitted', '".$name."')</script>";
           echo "<script> window.open ('add_record.php', '_self')</script>";

    } else {
        echo "Error: " . $stmt->error;
    }

}

?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
		

<h2 align="center">Log Your Health Data</h2>
<hr>
        <form method="POST">
            <div class="mb-3">
                <label for="type" class="form-label">Data Type</label>
                <select class="form-control" id="type" name="type" required>
                	<option value="" disabled selected> Select Data Type </option>
                    <option value="Meal">Meal</option>
                    <option value="Workout">Workout</option>
                    <option value="Medical">Medical</option>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <br>
            <div class="mb-3">
                <label for="calories" class="form-label">Calories (if applicable)</label>
                <input type="number" class="form-control" id="calories" name="calories" min="0">
            </div>
            <br>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (if applicable)</label>
                <input type="number" class="form-control" id="duration" name="duration" min="0" placeholder="Duration in minutes">
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>


</div>
</div>
</div>




<?php include ('footer.php'); ?>
