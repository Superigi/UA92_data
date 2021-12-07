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
<?php
include 'Contection.php';
// $query = "insert into names values('$mission_name','$destination','$launch_date','$type','$crew_size','$target_id')";
// print "<p> Misssions Information Inserted </p>";
$result = mysqli_query($conn, "SELECT * FROM targets");
?>

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
            <label for="name" class="form-label">Misssion Name:</label>
            <input type="text" class="form-control"placeholder="Enter Name" name="name">
        </div>
        <div class="mb-3">
            <label for="Destination" class="form-label">Destination:</label>
            <input type="text" class="form-control"  placeholder="Destination" name="destination">
        </div>
        <div class="mb-3">
            <label for="Launch_Date" class="form-label">Lanch Date:</label>
            <input type="date" class="form-control" name="Launch_Date">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" class="form-control"  placeholder="Enter type" name="type">
        </div>
        
        <div class="mb-3">
        <label for="type" class="form-label">Target ID:</label>
            <select id="target_ids" name="target_ids">
        <?php
        foreach ($result as $row ) {
            $thisValue = $row['target_id'];
            echo "<option  value= $thisValue >" . $thisValue . "</option>";
            }   
            ?>
            </select>   
        </div>
       
        <input type = "submit" name = "submit" value = "Submit" class="btn btn-warning">
        <!-- <button type="submit" name="sub" class="btn btn-primary">Submit</button> -->
    </form>
</body>

</html>
<?php
/* Attempt MySQL server connection. 
*/
include 'Contection.php';

if (isset($_POST['submit'])) {
    //Escape user inputs for validation
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $target_id = mysqli_real_escape_string($conn, $_POST['target_ids']);
    $lanch_date = mysqli_real_escape_string($conn,$_POST['Launch_Date']);

    // $name =$_POST['name'];
    // $destination =$_POST['destination'];
    // $type = $_POST['type'];
    // $target_id = $_POST['target_ids'];
    // $lanch_date = $_POST['Launch_Date'];
    // // print_r($target_id);

    // Attempt insert query execution
    $sql = "INSERT INTO mission (mission_name ,destination,launch_date,type,target_id) VALUES ('$name','$destination','$lanch_date','$type',$target_id)";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}

?>