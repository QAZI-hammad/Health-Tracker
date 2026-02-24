<?php
include('header.php');
include('sidebar.php');
?>

<div class="container">
    <h2>Your Exercise Logs</h2>
    <hr>
    <?php
    // Fetch the logged-in user's exercise records
    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM exercises WHERE user_id = '$user_id' ORDER BY timestamp DESC";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Date</th><th>Category</th><th>Name</th><th>Duration</th><th>Calories Burned</th><th>Action</th></tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['timestamp'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['duration'] . " mins</td>
                    <td>" . $row['calories_burned'] . " kcal</td>
                    <td>
                        <a href='delete_exercise.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>No exercise logs found!</p>";
    }
    ?>
</div>

<?php include('footer.php'); ?>
