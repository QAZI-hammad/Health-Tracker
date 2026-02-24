<?php
date_default_timezone_set("Asia/Karachi"); // Set timezone

include('header.php');
include('sidebar.php');
include('connection.php');

//Automatically expire all pending reminders where date & time has passed
$current_datetime = date('Y-m-d H:i');
mysqli_query($con, "UPDATE Reminders SET Status = 'Expired' WHERE Status = 'Pending' AND CONCAT(Date, ' ', Time) < '$current_datetime'");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

<center>
<h2>View Reminders</h2>
<hr>
<table class="table table-bordered table-responsive">
  <tr>
    <th>Serial Number</th>
    <th>Type</th> 
    <th>Date</th> 
    <th>Time</th> 
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  $qry = "SELECT * FROM Reminders WHERE UserID = '" . $_SESSION['id'] . "'";
  $run = mysqli_query($con, $qry);
  $i = 0;

  if (mysqli_num_rows($run) == 0) {
    echo "<h3>Record not found.</h3>";
  } else {
    while ($row = mysqli_fetch_assoc($run)) {
      $id = $row['ReminderID'];
      $type = $row['Type'];
      $date = $row['Date'];
      $time = $row['Time'];
      $status = $row['Status'];
      $i++;

      // Set status badge class
      $btn_class = 'btn-primary';
      if ($status == 'Completed') $btn_class = 'btn-success';
      elseif ($status == 'Cancelled') $btn_class = 'btn-danger';
      elseif ($status == 'Expired') $btn_class = 'btn-secondary';
  ?>
  <tr align="center">
    <td><?php echo $i; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $date; ?></td>
    <td><?php echo $time; ?></td>
    <td><span class="btn <?php echo $btn_class; ?>"><?php echo $status; ?></span></td>
    <td>
      <button class="btn btn-warning" data-toggle="modal" data-target="#statusModal<?php echo $id; ?>">Update Status</button>
      <a href="view_reminders.php?delete_id=<?php echo $id; ?>" class="btn btn-danger" onclick="return confirm('Delete this reminder?')">Delete</a>
    </td>
  </tr>

  <!-- Modal for updating status -->
  <div class="modal fade" id="statusModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Reminder Status</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <form method="POST" action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="status">Select Status:</label>
              <select name="status" class="form-control" required>
                <option value="Pending" <?php echo ($status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Completed" <?php echo ($status == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                <option value="Cancelled" <?php echo ($status == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="reminder_id" value="<?php echo $id; ?>">
            <button type="submit" name="update_status" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php }} ?>
</table>

<?php
// Update status manually
if (isset($_POST['update_status'])) {
    $reminder_id = $_POST['reminder_id'];
    $new_status = $_POST['status'];
    $update = mysqli_query($con, "UPDATE Reminders SET Status = '$new_status' WHERE ReminderID = '$reminder_id'");
    echo $update ? "<script>alert('Status updated successfully!');window.location='view_reminders.php';</script>"
                 : "<script>alert('Failed to update status.');</script>";
}

// Delete reminder
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete = mysqli_query($con, "DELETE FROM Reminders WHERE ReminderID = '$delete_id'");
    echo $delete ? "<script>alert('Reminder deleted successfully!');window.location='view_reminders.php';</script>"
                 : "<script>alert('Failed to delete reminder.');</script>";
}
?>

</center>
</div>
</div>
</div>

<?php include('footer.php'); ?>
