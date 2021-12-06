<html>

<head>
    <meta charset="utf-8">
    <!-- making is moblie device first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="" method="POST">
        <div class="mb-3 mt-3">
            <label for="first_mission" class="form-label">First Mission:</label>
            <input type="date" class="form-control"name="first_mission">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" class="form-control"  placeholder="Enter type" name="type">
        </div>
        
        <div class="mb-3">
            <label for="no_missions" class="form-label">No Missions:</label>
            <input type="integer" class="form-control"  placeholder="Enter no missions" name="no_missions">
        </div>
        <input type = "submit" name = "submit" value = "Submit">
        <!-- <button type="submit" name="sub" class="btn btn-primary">Submit</button> -->
    </form>
</body>

</html>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'Contection.php';

if (isset($_POST['submit'])) {
    // Escape user inputs for security
    $first_mission = mysqli_real_escape_string($conn, $_POST['first_mission']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $no_mission = mysqli_real_escape_string($conn, $_POST['no_mission']);

    // Attempt insert query execution
    $sql = "INSERT INTO targets (first_mission,type, no_mission) VALUES ('$first_mission', '$type', '$no_mission')";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}

?>