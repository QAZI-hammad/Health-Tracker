<?php

include ('header.php');

$id = $_GET['delete'];

$delete = "delete from complains where id = '$id'";

$sql 	= mysqli_query ($con, $delete);

if ($sql) {
	
echo "<script> window.alert('Selected record deleted')</script>";
echo "<script> window.open('complains.php', '_self')</script>";

}	

else {
	
	echo "not";
}


?>