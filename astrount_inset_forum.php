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
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control"placeholder="Enter Name" name="name">
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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $no_missions = mysqli_real_escape_string($conn, $_POST['no_missions']);

    // Attempt insert query execution
    $sql = "INSERT INTO astronaut (name ,no_missions) VALUES ('$name','$no_missions')";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}

?>