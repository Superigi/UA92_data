<?php

include 'Contection.php';

$sql1 = "DELETE FROM attends WHERE mission_id='" . $_GET["id"] . "'";
$sql = "DELETE FROM mission WHERE mission_id='" . $_GET["id"] . "'";

if (mysqli_query($conn, $sql1)) {

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


echo "<script>location.href='view_mission.php';</script>";

mysqli_close($conn);

?>
