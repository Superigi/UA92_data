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
       
        <input type = "submit" name = "submit" value = "Submit">
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