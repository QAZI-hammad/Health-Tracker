<?php
include('connection.php');

if (isset($_GET['type']) && isset($_GET['query'])) {
    $type = $_GET['type'];
    $query = $_GET['query'];

    if ($type == 'meal') {
        $sql = "SELECT * FROM suggestions WHERE type = 'meal' AND name LIKE '%$query%' LIMIT 5";
    } elseif ($type == 'exercise') {
        $sql = "SELECT * FROM suggestions WHERE type = 'exercise' AND name LIKE '%$query%' LIMIT 5";
    }

    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='suggestion'>" . $row['name'] . "</div>";
        }
    }
}
?>
