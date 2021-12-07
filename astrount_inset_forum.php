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
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded"">
        <div class=" container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Moon Elites</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10"
            aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown"
                        aria-expanded="false">Mission</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="mission_insert_form.php">Add Mission</a></li>
                        <li><a class="dropdown-item" href="">Del Mission</a></li>
                        <li><a class="dropdown-item" href="view_mission.php">View MIssions</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown"
                        aria-expanded="false">Astronout</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="astrount_inset_forum.php">Add Astronout</a></li>
                        <li><a class="dropdown-item" href="#">Remove Astronout </a></li>
                        <li><a class="dropdown-item" href="view_astronaut.php">View Astrounts</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown"
                        aria-expanded="false">Attends</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_attends.php">View Attends</a></li>
                        <li><a class="dropdown-item" href="attends_insert.php">Add Attends</a></li>
                        <li><a class="dropdown-item" href="#">Remove attends</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown"
                        aria-expanded="false">Target</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_target.php">View target</a></li>
                        <li><a class="dropdown-item" href="target_insert_forum.php">Add target</a></li>
                        <li><a class="dropdown-item" href="#">Remove target</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <form action="" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-control form-control-lg form-label">Name:</label>
            <input type="text" class="form-control form-control-lg "placeholder="Enter Name" name="name">
        </div>
        <div class="mb-3">
            <label for="no_missions" class="form-control form-control-lg form-label">No Missions:</label>
            <input type="integer" class="form-control form-control-lg "  placeholder="Enter no missions" name="no_missions">
        </div>
        <input type = "submit" name = "submit" value = "Submit" class="btn btn-warning">
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