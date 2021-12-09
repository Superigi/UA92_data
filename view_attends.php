<?php
include 'Contection.php';
// $query = "insert into names values('$mission_name','$destination','$launch_date','$type','$crew_size','$target_id')";
// print "<p> Misssions Information Inserted </p>";
$result = mysqli_query($conn, "SELECT * FROM Attends");
?>

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
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mission ID</th>
                    <th>Astronaut ID</th>
                    <th> DELETE </th>
                </tr>
            </thead>

    </div>
    <!-- <table border="2">
    <tr>
      <th>Mission Name</th>
      <th>Destination</th>
      <th>Launch date </th>
      <th>Type</th>
      <th>Crew Size</th>
      <th>Target Id</th>
    </tr> -->

</body>

<?php
foreach ($result as $row) {
  print "<tr> <td>";
  echo $row['mission_id'];
  print "</td> <td>";
  echo $row['astronaut_id'];
  print "</td>  <td>";
  echo "<a class='btn btn-danger' href=attends_del.php?id=".$row['mission_id'].">Delete </a>";
  print "</td> </tr>";
}
?>