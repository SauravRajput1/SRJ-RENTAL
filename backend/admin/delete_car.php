<?php
include '../config.php';
$sql = "DELETE FROM cars WHERE car_id='" . $_GET["car_id"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script type = \"text/javascript\">
	alert(\"Successfully Deleted\");
    window.location = (\"admincar.php\")
	</script>";
} else {
    echo "Error deleting car " . mysqli_error($con);
}
mysqli_close($con);
?>