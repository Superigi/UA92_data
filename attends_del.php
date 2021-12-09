<?php

include 'Contection.php';

$sql1 = "DELETE FROM attends WHERE mission_id='" . $_GET["id"] . "'";
//When the delete button is clicked it gets the id from the from the ?id url part and useses it as the astronaut_id in the table

if (mysqli_query($conn, $sql1)) {
    //runs the query from the attends table 
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


echo "<script>location.href='view_mission.php';</script>";
//runs a script to redirect to the view table again

mysqli_close($conn);
