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

    <link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2">
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='index.php';">Home</button>
        </div>
        <div class="col-xs-8">
<h1>Informasjon for tur <?php echo $_POST["id"] ?></h1>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <?php $id = $_POST["id"] - 1;


            $db = mysql_connect("mysql.stud.ntnu.no", "madssst_PU", "");

            mysql_select_db("madssst_PUDB", $db);
            $result = mysql_query("SELECT * FROM Trip", $db);

            $idTrip = mysql_result($result, $id, "idTrip");
            $startTidspunkt = mysql_result($result, $id, "StartTidspunkt");
            $sluttTidspunkt = mysql_result($result, $id, "SluttTidspunkt");
            $avgVehicleSpeed = mysql_result($result, $id, "AvgVehicleSpeed");
            $tripTime = mysql_result($result, $id, "TripTime");
            $co2 = mysql_result($result, $id, "Co2");
            $fuelConsume = mysql_result($result, $id, "FuelConsume");
            $fuelCost = mysql_result($result, $id, "FuelCost");


            echo "TurID: ", $idTrip, "<br>";
            echo "Starttidspunkt: ", $startTidspunkt, "<br>";
            echo "Sluttidspunkt: ", $sluttTidspunkt, "<br>";
            echo "Gjennomsnittlig fart: ", $avgVehicleSpeed, " km/h", "<br>";
            echo "Turlengde: ", $tripTime, "<br>";
            echo "CO2: ", $co2, " g", "<br>";
            echo "Drivstofforbruk: ", $fuelConsume, " l", "<br>";
            echo "Drivstoff kostnad: ", $fuelCost, " Kr", "<br>";
            ?>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>

</body>
</html>
