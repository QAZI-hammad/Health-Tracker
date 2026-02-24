<?php
include('header.php');
include('sidebar.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <center>
                <h3>Your Health Logs</h3>
                <hr>

                <?php
                // Fetch user's health data
                $sql = "SELECT * FROM HealthData WHERE UserID = '".$_SESSION['id']."' ORDER BY Date DESC";
                $result = $con->query($sql);

                echo "<table class='table table-striped table-bordered'>";
                echo "<thead><tr><th>Date</th><th>Type</th><th>Description</th><th>Calories</th><th>Duration</th><th>Action</th></tr></thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    // Each row represents a health log
                    echo "<tr><td>" . $row['Date'] . "</td><td>" . $row['Type'] . "</td><td>" . $row['Description'] . "</td><td>" . $row['Calories'] . "</td><td>" . $row['Duration'] . " mins</td>";

                    // Add delete button for each record
            echo "<td><a href='delete_health_log.php?id=" . $row['EntryID'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";
                }

                echo "</tbody></table>";
                ?>
            </center>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
