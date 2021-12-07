<?php

include 'Contection.php';

$sql1 ="DELETE FROM attends WHERE mission_id='" . $_GET["id"] . "'";
$sql = "DELETE FROM mission WHERE mission_id='" . $_GET["id"] . "'";

if (mysqli_query($conn ,$sql1)) {
echo "Record deleted successfully";

} else {
echo "Error deleting record: " . mysqli_error($conn);
}
if (mysqli_query($conn ,$sql)) {
    
    } else {
    echo "Error deleting record: " . mysqli_error($conn);
    }

    echo "<script>location.href='index.php';</script>";

    mysqli_close($conn);
?>