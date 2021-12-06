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
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="type" class="form-control form-control-lg form-label">Mission ID:</label>
                <select id="mission_name" name="mission_id"class="form-control form-control-lg">
                    <?php
                    foreach ($result1 as $row1) {
                        $thisValue1 = $row1['mission_id'];
                        echo "<option  value= $thisValue1 >" . $thisValue1 . "</option>";
                    }
                    ?>
                </select>
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
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-warning">
            <!-- <button type="submit" name="sub" class="btn btn-primary">Submit</button> -->
        </form>
    </div>
</body>


</html>
<?php
/* Attempt MySQL server connection. 
*/
include 'Contection.php';

if (isset($_POST['submit'])) {
    //Escape user inputs for validation
    $mission_name = mysqli_real_escape_string($conn, $_POST['mission_id']);
    $astronaut_id = mysqli_real_escape_string($conn, $_POST['astronaut_id']);

    // $name =$_POST['name'];
    // $destination =$_POST['destination'];
    // $type = $_POST['type'];
    // $target_id = $_POST['target_ids'];
    // $lanch_date = $_POST['Launch_Date'];
    // // print_r($target_id);

    // Attempt insert query execution
    $sql = "INSERT INTO attends (mission_id ,astronaut_id) VALUES ('$mission_name',$astronaut_id)";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $as = mysqli_query($conn, "SELECT no_missions FROM astronaut WHERE astronaut_id = $astronaut_id ");

    $result2 = mysqli_fetch_assoc($as);
    $current_missions = $result2['no_missions'];
    $new_no_mission =  $current_missions + 1;

    mysqli_query($conn, "UPDATE astronaut SET no_missions=$new_no_mission  WHERE astronaut_id = $astronaut_id ");

    $mi = mysqli_query($conn, "SELECT crew_size FROM mission WHERE mission_id = $mission_name ");

    $result2 = mysqli_fetch_assoc($mi);
    $current_crew_size = $result2['crew_size'];
    $new_crew_size =  $current_crew_size + 1;

    mysqli_query($conn, "UPDATE mission SET crew_size=$new_crew_size  WHERE mission_id = $mission_name  ");
    // echo "hello"; 

    // $newas = $as+1;
    // $alteras = "UPDATE astronaut (no_mission) WHERE astronaut_id =$astronaut_id VALUES ($newas)";
    // if (mysqli_query($conn, $alteras)) {
    //     echo "Records added successfully.";
    // } else {
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    //     print($as);
    // }


    // Close connection
    mysqli_close($conn);
}

?>