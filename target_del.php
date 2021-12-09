<?php

include 'Contection.php';

$sql = "DELETE FROM targets WHERE target_id='" . $_GET["id"] . "'";

if (mysqli_query($conn, $sql)) {
    echo"Sucess";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


echo "<script>location.href='view_target.php';</script>";

mysqli_close($conn);

?>