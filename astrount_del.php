<?php

include 'Contection.php';

$sql = "DELETE FROM astronaut WHERE astronaut_id='" . $_GET["id"] . "'";
$sql1 = "DELETE FROM attends WHERE astronaut_id='" . $_GET["id"] . "'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_query($conn, $sql1)){
        echo "Record deleted successfully";
    }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


echo "<script>location.href='view_astronaut.php';</script>";

mysqli_close($conn);

?>