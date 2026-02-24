<?php 
include('header.php');
include('sidebar.php'); 




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_SESSION['id'];  // Get this from session or authentication
    $type = $_POST['type'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO Reminders (UserID, Type, Date, Time) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isss", $userID, $type, $date, $time);

    if ($stmt->execute()) {
       echo "<script> alert (' Your data has been submitted')</script>";
           echo "<script> window.open ('add_reminders.php', '_self')</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    
}
?>



		<div class="container">
			<br />
			<div class="row">
			<div class="col-lg-12">
    <h2>Set Reminder</h2>
    <hr>
    <form method="POST">
        <div class="mb-3">
            <label for="reminder_type" class="form-label">Reminder Type</label>
            <select class="form-control" id="reminder_type" name="type" required>
            	<option value="" disabled selected> Choose Type </option>
                <option value="Medication">Medication</option>
                <option value="Workout">Workout</option>
            </select>
        </div>
        <br>
        <div class="mb-3">
            <label for="reminder_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="reminder_date" name="date" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="reminder_time" class="form-label">Time</label>
            <input type="time" class="form-control" id="reminder_time" name="time" required>
        </div>
<br>
        <button type="submit" class="btn btn-primary btn-block">Set Reminder</button>
    </form>
</div>

</div>
</div>

</div>
</div>
</div>




<?php include ('footer.php'); ?>
