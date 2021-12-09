<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- import bootstrap style sheet -->
    

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- import of bootstrap scripts -->
    <link href="bg.css" rel="stylesheet">
    <!-- import local style sheet -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded"">
        <div class=" container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Moon Elites</a>
            <!-- add the title to the nav bar which redirects to index.php -->
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <!-- when the navbar is collaped because of size change it breates abutuon to show the nav bar. this is built in from bootstrap -->
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <!-- creates the drop down option -->
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Mission</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_mission.php">View MIssions</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                        <li><a class="dropdown-item" href="mission_insert_form.php">Add Mission</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->

                    </ul>
                </li>
                <li class="nav-item dropdown">
                     <!-- creates the drop down option -->
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Astronout</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_astronaut.php">View Astrounts</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                        <li><a class="dropdown-item" href="astrount_inset_forum.php">Add Astronout</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->

                    </ul>
                </li>
                <li class="nav-item dropdown">
                     <!-- creates the drop down option -->
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Attends</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_attends.php">View Attends</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                        <li><a class="dropdown-item" href="attends_insert.php">Add Attends</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                    </ul>
                </li>
                <li class="nav-item dropdown">
                     <!-- creates the drop down option -->
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Target</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown10">
                        <li><a class="dropdown-item" href="view_target.php">View target</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                        <li><a class="dropdown-item" href="target_insert_forum.php">Add target</a></li>
                        <!-- this is the option in the dropdown which redirects to the correct .php file -->
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</head>

<body>

    
</body>

</html>