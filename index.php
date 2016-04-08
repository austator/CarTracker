<html>
<head>
    <title>CarTracker</title>
    <meta charset="utf-8">

    <title>CarTracker</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Highcharts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>

    <link href="css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php

$servername = "mysql.stud.ntnu.no";
$username = "madssst_PU";
$password = "";
$db = "madssst_PUDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "<h1>Connected successfully (´・ω・`)</h1><br>";
}

$sql = "SELECT * FROM Trip";
$result = mysqli_query($conn, $sql);


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4"><h1>CarTracker</h1></div>
        <div class="col-xs-4"></div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <form action="trip.php" method="post" role="form">
                <div class="form-group">
                    <label for="number">Velg tur:</label>
                    <select class="form-control formText" id="id" name="id">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["idTrip"] . "'>" . $row["StartTidspunkt"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-default">Velg</button>
                </div>
            </form>
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='overview.php';">Oversikt over alle
                turer
            </button>
            <div class="form-group"></div>
            
        </div>
        <div class="col-xs-4"></div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4"></div>
        <div class="col-xs-4"></div>
    </div>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4"></div>
        <div class="col-xs-4"></div>
    </div>
</div>

</body>
</html>




