<?php

include 'Contection.php';

$sql = "DELETE FROM targets WHERE target_id='" . $_GET["id"] . "'";
//When the delete button is clicked it gets the id from the from the ?id url part and useses it as the astronaut_id in the table

if (mysqli_query($conn, $sql)) {
    // run the delete query from the target table
    echo"Sucess";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


echo "<script>location.href='view_target.php';</script>";
//runs a script to redirect to the view table again

mysqli_close($conn);

?>