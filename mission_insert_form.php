<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Lastest bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">


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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Mission</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_mission.php">View MIssions</a></li>
                        <li><a class="dropdown-item" href="mission_insert_form.php">Add Mission</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Astronout</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_astronaut.php">View Astrounts</a></li>
                        <li><a class="dropdown-item" href="astrount_inset_forum.php">Add Astronout</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Attends</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_attends.php">View Attends</a></li>
                        <li><a class="dropdown-item" href="attends_insert.php">Add Attends</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Target</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_target.php">View target</a></li>
                        <li><a class="dropdown-item" href="target_insert_forum.php">Add target</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <form action="" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Misssion Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name">
            <!-- Imput which is defined by name -->
        </div>
        <div class="mb-3">
            <label for="Destination" class="form-label">Destination:</label>
            <input type="text" class="form-control" placeholder="Destination" name="destination">
            <!-- Imput which is defined by name -->
        </div>
        <div class="mb-3">
            <label for="Launch_Date" class="form-label">Lanch Date:</label>
            <input type="date" class="form-control" name="Launch_Date">
            <!-- Imput which is defined by name -->
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" class="form-control" placeholder="Enter type" name="type">
            <!-- Imput which is defined by name -->
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Target ID:</label>
            <select id="target_ids" name="target_ids">
                <!-- Imput which is defined by name -->
                <?php
                foreach ($result as $row) {
                    $thisValue = $row['target_id'];
                    echo "<option  value= $thisValue >" . $thisValue . "</option>";
                }
                ?>
            </select>
            <!-- selction option that pulls data of target ids and allows user to choses which id they wan t to speify -->
        </div>

        <input type="submit" name="submit" value="Submit">

    </form>
</body>
<?php
/* Attempt MySQL server connection. 
*/
include 'Contection.php';

if (isset($_POST['submit'])) {
    //Escape user inputs for validation
    $name = test_input(mysqli_real_escape_string($conn, $_POST['name']));
    //imput with the correct name deffinetion is put in to a varible
    $destination = test_input(mysqli_real_escape_string($conn, $_POST['destination']));
    //imput with the correct name deffinetion is put in to a varible
    $type = test_input(mysqli_real_escape_string($conn, $_POST['type']));
    //imput with the correct name deffinetion is put in to a varible
    $target_id = test_input(mysqli_real_escape_string($conn, $_POST['target_ids']));
    //imput with the correct name deffinetion is put in to a varible
    $lanch_date = test_input(mysqli_real_escape_string($conn, $_POST['Launch_Date']));
    //imput with the correct name deffinetion is put in to a varible


    // Attempt insert query execution using the varibles defined
    $sql = "INSERT INTO mission (mission_name,destination,launch_date,type,target_id) VALUES ('$name','$destination','$lanch_date','$type',$target_id)";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
        $as = mysqli_query($conn, "SELECT no_mission FROM targets WHERE target_id = $target_id ");
        // pull all tragets rows which the specify target  varible
        $result2 = mysqli_fetch_assoc($as);
        //puts the results in to a varible
        $current_missions = $result2['no_missions'];
        //speficys the correct collum
        $new_no_mission =  $current_missions + 1;
        //adds to the collum that is specifed with the id from $...id

        mysqli_query($conn, "UPDATE targets SET no_missions=$new_no_mission  WHERE target_id = $target_id ");
        //pushes it to the table
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close of the connection 
    mysqli_close($conn);
}

?>