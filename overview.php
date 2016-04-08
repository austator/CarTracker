<html>
<head>
    <title>CarTracker</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Highcharts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <link href="css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2">
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='index.php';">Hjem</button>
        </div>
        <div class="col-xs-8">
            <h1>Informasjon for alle turer</h1>
            <button type="submit" class="btn btn-default" onclick="location.href='fuel.php';">Drivstofforbruk</button>
            <button type="submit" class="btn btn-default" onclick="location.href='time.php';">Tidsbruk</button>
        </div>

        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
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
                //echo "<h1>Connected successfully :3</h1>";
            }

            $sql = "SELECT * FROM Trip";
            $result = mysqli_query($conn, $sql);

            $antallID = mysqli_num_rows($result);


            echo "<br>Antall turer i databasen: " . $antallID . "<br>";

            $idTrip = 0;
            $startTidspunkt = 0;
            $sluttTidspunkt = 0;
            $avgVehicleSpeed = 0;
            $tripTime = 0;
            $co2 = 0;
            $fuelConsume = 0;
            $fuelCost = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $idTrip = $row['idTrip'];
                $startTidspunkt = $row['StartTidspunkt'];
                $sluttTidspunkt = $row['SluttTidspunkt'];
                $avgVehicleSpeed = $row['AvgVehicleSpeed'];
                $tripTime = $row['TripTime'];
                $co2 = $row['Co2'];
                $fuelConsume = $row['FuelConsume'];
                $fuelCost = $row['FuleCost'];

                echo "<br>";
                echo "<p style='font-weight: bold;'>TurID: " . $idTrip . "</p>";
                echo "Starttidspunkt: ", $startTidspunkt, "<br>";
                echo "Sluttidspunkt: ", $sluttTidspunkt, "<br>";
                echo "Gjennomsnittlig fart: ", $avgVehicleSpeed, " km/h", "<br>";
                echo "Turlengde: ", $tripTime, "<br>";
                echo "CO<sub>2</sub>: ", $co2, " g", "<br>";
                echo "Drivstofforbruk: ", $fuelConsume, " l", "<br>";
                echo "Drivstoff kostnad: ", $fuelCost, " Kr", "<br>";
                echo "<br>";
            }

            mysqli_close($conn);

            ?>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"></div>
        <div class="col-xs-2"></div>
    </div>
</div>
</body>
</html>
