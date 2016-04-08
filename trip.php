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
            <h1>Informasjon for tur <?php echo $_POST["id"] ?></h1>
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

            }

            $sql = "SELECT * FROM Trip";
            $result = mysqli_query($conn, $sql);


            $idTrip = $_POST["id"];

            $startTidspunkt = 0;
            $sluttTidspunkt = 0;
            $avgVehicleSpeed = 0;
            $tripTime = 0;
            $tripTimeSeconds = 0;
            $tripTimeMinutes = 0;
            $tripTimeHours = 0;
            $co2 = 0;
            $fuelConsume = 0;
            $fuelCost = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['idTrip'] == $idTrip) {
                    $startTidspunkt = $row['StartTidspunkt'];
                    $sluttTidspunkt = $row['SluttTidspunkt'];
                    $avgVehicleSpeed = $row['AvgVehicleSpeed'];
                    $tripTime = $row['TripTime'];

                    $tripTimeHours = (float)substr($row['TripTime'], 0, 2);
                    $tripTimeMinutes = (float)substr($row['TripTime'], 3, 2);
                    $tripTimeSeconds = (float)substr($row['TripTime'], 6, 2);

                    $co2 = $row['Co2'];
                    $fuelConsume = $row['FuelConsume'];
                    $fuelCost = $row['FuelCost'];
                }
            }

            $thisTripTime = $tripTimeHours * 3600 + $tripTimeMinutes * 60 + $tripTimeSeconds;

            echo "TurID: ", $idTrip, "<br>";
            echo "Starttidspunkt: ", $startTidspunkt, "<br>";
            echo "Sluttidspunkt: ", $sluttTidspunkt, "<br>";
            echo "Gjennomsnittlig fart: ", $avgVehicleSpeed, " km/t", "<br>";
            echo "Turlengde: ", $tripTime, "<br>";
            echo "CO<sub>2</sub>: ", $co2, " g", "<br>";
            echo "Drivstofforbruk: ", $fuelConsume, " l", "<br>";
            echo "Drivstoff kostnad: ", $fuelCost, " kr", "<br>";


            ?>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2">
            <?php

            if ($idTrip > 1) {
                echo "<form action=\"trip.php\" method=\"post\" role=\"form\">";
                echo "<div class=\"form-group\">";
                echo "<button id=\"id\" type=\"submit\" name=\"id\" value=\"" . ($idTrip - 1) . "\" class=\"btn btn-default\">Forrige</button>";
                echo "</div>";
                echo "</form>";
            }

            ?>
        </div>
        <div class="col-xs-8">
            <h3>Sammenlignet med gjennomsnittet</h3>

            <?php
            $totIdTrip = 0;
            $totAvgVehicleSpeed = 0;
            $totTripTimeHours = 0;
            $totTripTimeMinutes = 0;
            $totTripTimeSeconds = 0;
            $totCo2 = 0;
            $totFuelConsume = 0;
            $totFuelCost = 0;

            $result = mysqli_query($conn, $sql);
            // Total valus
            while ($row = mysqli_fetch_assoc($result)) {
                $totIdTrip += $row["idTrip"];
                $totAvgVehicleSpeed += $row['AvgVehicleSpeed'];

                $totTripTimeHours += (float)substr($row['TripTime'], 0, 2);
                $totTripTimeMinutes += (float)substr($row['TripTime'], 3, 2);
                $totTripTimeSeconds += (float)substr($row['TripTime'], 6, 2);

                $totCo2 += $row['Co2'];
                $totFuelConsume += $row['FuelConsume'];
                $totFuelCost += $row['FuelCost'];
            }

            // Id
            echo "Det er totalt " . mysqli_num_rows($result) . " turer i databasen.<br>";


            echo "<br>";


            // Speed
            $avgAvgVehicleSpeed = $totAvgVehicleSpeed / mysqli_num_rows($result);
            $speedDifference = $avgVehicleSpeed - $avgAvgVehicleSpeed;

            echo "Gjennomsnittsfarten for alle turer er " . round($avgAvgVehicleSpeed, 1) . " km/t.<br>";

            if (round($speedDifference, 2) > 0) {
                echo "Du kjørte " . round($speedDifference, 1) . " km/t raskere enn gjennomsnittet.<br>";
            } else if ($speedDifference < 0) {
                echo "Du kjørte " . -1 * round($speedDifference, 1) . " km/t seinere enn gjennomsnittet.<br>";
            } else {
                echo "Du kjørte akkurat like raskt som gjennomsnittet.<br>";
            }

            echo "<br>";

            // Time
            $totTripTime = $totTripTimeSeconds + $totTripTimeMinutes * 60 + $totTripTimeHours * 60 * 60;
            $avgTripTime = $totTripTime / mysqli_num_rows($result);

            $avgTripTimeHours = $avgTripTime / 3600;
            $avgTripTimeMinutes = $avgTripTimeHours * 60;
            $avgTripTimeSeconds = $avgTripTimeMinutes * 60 - floor($avgTripTimeMinutes) * 60;

            echo "En gjennomsnittlig tur varer " . floor($avgTripTimeHours) . " t " . floor($avgTripTimeMinutes) . " m " . round($avgTripTimeSeconds) . " s.<br>";

            $tripTimeDifference = $thisTripTime - $avgTripTime;
            $tripTimeDifferenceHours = $tripTimeDifference / 3600;
            $tripTimeDifferenceMinutes = $tripTimeDifferenceHours * 60;
            $tripTimeDifferenceSeconds = $tripTimeDifferenceMinutes * 60 - floor($tripTimeDifferenceMinutes) * 60;
            if ($tripTimeDifference < 0) {
                echo "Denne turen varte " . -1 * ceil($tripTimeDifferenceHours) . " t " . -1 * ceil($tripTimeDifferenceMinutes) . " m " . (60 - round($tripTimeDifferenceSeconds)) . " s kortere enn gjennomsnittet.<br>";
            } else if ($tripTimeDifference > 0) {
                echo "Denne turen varte " . floor($tripTimeDifferenceHours) . " t " . floor($tripTimeDifferenceMinutes) . " m " . round($tripTimeDifferenceSeconds) . " s lengre enn gjennomsnittet.<br>";
            } else {
                echo "Denne turen varte akkurat like lenge som gjennomsnittet.<br>";
            }

            echo "<br>";


            //CO2
            $avgCo2 = $totCo2 / mysqli_num_rows($result);

            echo "En gjennomsnitlig tur slipper ut " . round($avgCo2, 2) . " gram CO<sub>2</sub>. Total har du sluppet ut " . round($totCo2, 2) . " gram CO<sub>2</sub>.<br>";
            $co2Difference = $co2 - $avgCo2;
            if ($co2Difference < 0) {
                echo "Denne turen slapp du ut " . -1 * round($co2Difference, 2) . " gram mindre CO<sub>2</sub> enn gjennomsnittet.<br>";
            } else if ($co2Difference > 0) {
                echo "Denne turen slapp du ut " . round($co2Difference, 2) . " gram mer CO<sub>2</sub> enn gjennomsnittet.<br>";
            } else {
                echo "Denne turen slapp du ut like mye CO<sub>2</sub> som gjennomsnittet.";
            }

            echo "<br>";


            //Fuel
            $avgFuelConsume = $totFuelConsume / mysqli_num_rows($result);
            $avgFuelCost = $totFuelCost / mysqli_num_rows($result);

            echo "En gjennomsnittlig tur bruker " . round($avgFuelConsume, 2) . " liter drivstoff og koster " . round($avgFuelCost, 2) . " kroner.<br>";

            $fuelConsumeDifference = $fuelConsume - $avgFuelConsume;
            $fuelCostDifference = $fuelCost - $avgFuelCost;
            if ($fuelConsumeDifference < 0) {
                echo "Denne turen brukte du " . -1 * round($fuelConsumeDifference, 2) . " liter mindre enn gjennomsnittet. Du brukte " . -1 * round($fuelCostDifference, 2) . " kr mindre enn gjennomsnittet.<br>";
            } else if ($fuelConsumeDifference > 0) {
                echo "Denne turen brukte du " . round($fuelConsumeDifference, 2) . " liter mer enn gjennomsnittet. Du brukte " . round($fuelCostDifference, 2) . " kr mer enn gjennomsnittet.<br>";
            }

            mysqli_close($conn);

            ?>


        </div>
        <div class="col-xs-2">
            <?php

            if ($idTrip < mysqli_num_rows($result)) {
                echo "<form action=\"trip.php\" method=\"post\" role=\"form\">";
                echo "<div class=\"form-group\">";
                echo "<button id=\"id\" type=\"submit\" name=\"id\" value=\"" . ($idTrip + 1) . "\" class=\"btn btn-default\">Neste</button>";
                echo "</div>";
                echo "</form>";
            }

            ?>


        </div>
    </div>
</div>

</body>
</html>
