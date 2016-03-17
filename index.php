<html>
<head>
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

<?php $id = $_POST["id"] - 1;


$db = mysql_connect("mysql.stud.ntnu.no", "madssst_PU", "");

mysql_select_db("madssst_PUDB", $db);
$result = mysql_query("SELECT * FROM Trip ORDER BY idTrip DESC LIMIT 1", $db);

$maxIdTrip = mysql_result($result, 0, "idTrip");

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
            <h4>Velg et tall fra og med 1 til og med <?php echo $maxIdTrip; ?></h4>
            <form action="trip.php" method="post" role="form">
                <div class="form-group">
                    <label for="number">TripID</label>
                    <input type="number" class="form-control formText" id="id" name="id"><br>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='overview.php';">Overview</button>
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='fuel.php';">Fuel Consumption</button>
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




