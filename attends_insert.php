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
$result = mysqli_query($conn, "SELECT * FROM astronaut");
$result1 = mysqli_query($conn, "SELECT * FROM mission");
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
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="type" class="form-control form-control-lg form-label">Mission ID:</label>
                <select id="mission_name" name="mission_id" class="form-control form-control-lg">
                    <?php
                    foreach ($result1 as $row1) {
                        $thisValue1 = $row1['mission_id'];
                        echo "<option  value= $thisValue1 >" . $thisValue1 . "</option>";
                    }
                    ?>
                </select>
                <!-- selction option that pulls data of target ids and allows user to choses which id they wan t to speify -->
            </div>
            <div class="mb-3">
                <label for="type" class="form-control form-control-lg form-label">Astronaut ID:</label>
                <select id="astronaut_id" name="astronaut_id" class="form-control form-control-lg">
                    <?php
                    foreach ($result as $row) {
                        $thisValue = $row['astronaut_id'];
                        echo "<option  value= $thisValue >" . $thisValue . "</option>";
                    }
                    ?>
                </select>
                <!-- selction option that pulls data of target ids and allows user to choses which id they wan t to speify -->
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-warning">
           
        </form>
    </div>
</body>


</html>
<?php
/* Attempt MySQL server connection. 
*/
include 'Contection.php';
include 'val.php';

if (isset($_POST['submit'])) {
    //Escape user inputs for validation
    $mission_name = test_input (mysqli_real_escape_string($conn, $_POST['mission_id']));
    //imput with the correct name deffinetion is put in to a varible
    $astronaut_id = test_input( mysqli_real_escape_string($conn, $_POST['astronaut_id']));
    //imput with the correct name deffinetion is put in to a varible

    // $name =$_POST['name'];
    // $destination =$_POST['destination'];
    // $type = $_POST['type'];
    // $target_id = $_POST['target_ids'];
    // $lanch_date = $_POST['Launch_Date'];
    // // print_r($target_id);

    // Attempt insert query execution using the varibles defined
    $sql = "INSERT INTO attends (mission_id ,astronaut_id) VALUES ('$mission_name',$astronaut_id)";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $as = mysqli_query($conn, "SELECT no_missions FROM astronaut WHERE astronaut_id = $astronaut_id ");
    // pull all tragets rows which the specify target  varible

    $result2 = mysqli_fetch_assoc($as);
    //puts the results in to a varible
    $current_missions = $result2['no_missions'];
     //speficys the correct collum
    $new_no_mission =  $current_missions + 1;
    //adds to the collum that is specifed with the id from $...id

    mysqli_query($conn, "UPDATE astronaut SET no_missions=$new_no_mission  WHERE astronaut_id = $astronaut_id ");
    //pushes it to the table


    $mi = mysqli_query($conn, "SELECT crew_size FROM mission WHERE mission_id = $mission_name ");
    // pull all tragets rows which the specify target  varible

    $result2 = mysqli_fetch_assoc($mi);
    //puts the results in to a varible
    $current_crew_size = $result2['crew_size'];
     //speficys the correct collum
    $new_crew_size =  $current_crew_size + 1;
     //adds to the collum that is specifed with the id from $...idthat is specifed with the id from $...id

    mysqli_query($conn, "UPDATE mission SET crew_size=$new_crew_size  WHERE mission_id = $mission_name  ");
     //pushes it to the table


    // Close connection
    mysqli_close($conn);
}

?>