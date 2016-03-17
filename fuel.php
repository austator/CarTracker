<html>
<head>
    <title>CarTracker testerino</title>
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

    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2">
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='index.php';">Home</button>
        </div>
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
                echo "<h1>Connected successfully :3</h1><br>";
            }

            $sql = "SELECT * FROM Trip";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    //echo "Tid: " . $row["StartTidspunkt"] . "<br>";
                    //echo "Måned " . substr($row["StartTidspunkt"], 5, 2) . "<br>";
                    //echo "id: " . $row["idTrip"]. " - Name: " . $row["TripTime"]. " " . $row["FuelCost"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            ?>

            <div id="monthFuel" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>
        <div class="col-xs-2"></div>
    </div>
</div>


<script>$(function () {
        $('#monthFuel').highcharts({
            title: {
                text: 'Drivstofforbruk Per Måned',
                x: -20 //center
            },
            subtitle: {
                text: 'Kilde: http://openxcplatform.com/resources/traces.html',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Drivstofforbruk (liter)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' l'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Alle turer',
                data: [
                    <?php
                    $sql = "SELECT * FROM Trip";
                    $result = mysqli_query($conn, $sql);

                    $januaryFuel = 0;
                    $februaryFuel = 0;
                    $marchFuel = 0;
                    $aprilFuel = 0;
                    $mayFuel = 0;
                    $juneFuel = 0;
                    $julyFuel = 0;
                    $augustFuel = 0;
                    $septemberFuel = 0;
                    $octoberFuel = 0;
                    $novemberFuel = 0;
                    $decemberFuel = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $month = substr($row["StartTidspunkt"], 5, 2);
                            if ($month == 1) {
                                $januaryFuel += $row["FuelConsume"];
                            } elseif ($month == 2) {
                                $februaryFuel += $row["FuelConsume"];
                            } elseif ($month == 3) {
                                $marchFuel += $row["FuelConsume"];
                            } elseif ($month == 4) {
                                $aprilFuel += $row["FuelConsume"];
                            } elseif ($month == 5) {
                                $mayFuel += $row["FuelConsume"];
                            } elseif ($month == 6) {
                                $juneFuel += $row["FuelConsume"];
                            } elseif ($month == 7) {
                                $julyFuel += $row["FuelConsume"];
                            } elseif ($month == 8) {
                                $augustFuel += $row["FuelConsume"];
                            } elseif ($month == 9) {
                                $septemberFuel += $row["FuelConsume"];
                            } elseif ($month == 10) {
                                $octoberFuel += $row["FuelConsume"];
                            } elseif ($month == 11) {
                                $novemberFuel += $row["FuelConsume"];
                            } elseif ($month == 12) {
                                $decemberFuel += $row["FuelConsume"];
                            } else {

                            }
                        }
                    }

                    echo $januaryFuel . ",";
                    echo $februaryFuel . ",";
                    echo $marchFuel . ",";
                    echo $aprilFuel . ",";
                    echo $mayFuel . ",";
                    echo $juneFuel . ",";
                    echo $julyFuel . ",";
                    echo $augustFuel . ",";
                    echo $septemberFuel . ",";
                    echo $octoberFuel . ",";
                    echo $novemberFuel . ",";
                    echo $decemberFuel;

                    mysqli_close($conn);
                    ?>
                ]
            }]
        });
    });</script>
</body>
</html>