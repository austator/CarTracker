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

    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2">
            <div class="form-group"></div>
            <button type="submit" class="btn btn-default" onclick="location.href='index.php';">Hjem</button>
            <button type="submit" class="btn btn-default" onclick="location.href='overview.php';">Tilbake</button>
        </div>
        <div class="col-xs-8">
            <h1>Drivstofforbruk</h1>

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
                //echo "<h1>Connected successfully :3</h1><br>";
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
            <div id="dayFuel" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


        </div>
        <div class="col-xs-2"></div>
    </div>
</div>


<script>$(function () {
        $('#monthFuel').highcharts({
            title: {
                text: 'Gjennomsnittlig Drivstofforbruk Per Tur Per Måned',
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

                    $monthCounter1 = 1;
                    $monthCounter2 = 1;
                    $monthCounter3 = 1;
                    $monthCounter4 = 1;
                    $monthCounter5 = 1;
                    $monthCounter6 = 1;
                    $monthCounter7 = 1;
                    $monthCounter8 = 1;
                    $monthCounter9 = 1;
                    $monthCounter10 = 1;
                    $monthCounter11 = 1;
                    $monthCounter12 = 1;

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
                            $month = (float)substr($row["StartTidspunkt"], 5, 2);
                            if ($month == 1) {
                                $januaryFuel += $row["FuelConsume"];
                                $monthCounter1 += 1;
                            }
                            elseif ($month == 2) {
                                $februaryFuel += $row["FuelConsume"];
                                $monthCounter2 += 1;
                            }
                            elseif ($month == 3) {
                                $marchFuel += $row["FuelConsume"];
                                $monthCounter3 += 1;
                            }
                            elseif ($month == 4) {
                                $aprilFuel += $row["FuelConsume"];
                                $monthCounter4 += 1;
                            }
                            elseif ($month == 5) {
                                $mayFuel += $row["FuelConsume"];
                                $monthCounter5 += 1;
                            }
                            elseif ($month == 6) {
                                $juneFuel += $row["FuelConsume"];
                                $monthCounter6 += 1;
                            }
                            elseif ($month == 7) {
                                $julyFuel += $row["FuelConsume"];
                                $monthCounter7 += 1;
                            }
                            elseif ($month == 8) {
                                $augustFuel += $row["FuelConsume"];
                                $monthCounter8 += 1;
                            }
                            elseif ($month == 9) {
                                $septemberFuel += $row["FuelConsume"];
                                $monthCounter9 += 1;
                            }
                            elseif ($month == 10) {
                                $octoberFuel += $row["FuelConsume"];
                                $monthCounter10 += 1;
                            }
                            elseif ($month == 11) {
                                $novemberFuel += $row["FuelConsume"];
                                $monthCounter11 += 1;
                            }
                            elseif ($month == 12) {
                                $decemberFuel += $row["FuelConsume"];
                                $monthCounter12 += 1;
                            }
                            else {

                            }
                        }
                    }

                    echo ($januaryFuel/$monthCounter1) . ",";
                    echo ($februaryFuel/$monthCounter2) . ",";
                    echo ($marchFuel/$monthCounter3) . ",";
                    echo ($aprilFuel/$monthCounter4) . ",";
                    echo ($mayFuel/$monthCounter5) . ",";
                    echo ($juneFuel/$monthCounter6) . ",";
                    echo ($julyFuel/$monthCounter7) . ",";
                    echo ($augustFuel/$monthCounter8) . ",";
                    echo ($septemberFuel/$monthCounter9) . ",";
                    echo ($octoberFuel/$monthCounter10) . ",";
                    echo ($novemberFuel/$monthCounter11) . ",";
                    echo ($decemberFuel/$monthCounter12);

                    //mysqli_close($conn);
                    ?>
                ]
            }]
        });
    });</script>

<script>$(function () {
        $('#dayFuel').highcharts({
            title: {
                text: 'Gjennomsnittlig Drivstofforbruk Per Tur Per Dag',
                x: -20 //center
            },
            subtitle: {
                text: 'Kilde: http://openxcplatform.com/resources/traces.html',
                x: -20
            },
            xAxis: {
                categories: ['Man', 'Tir', 'Ons', 'Tors', 'Fre', 'Lør',
                    'Søn']
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

                    $dayCounter1 = 1;
                    $dayCounter2 = 1;
                    $dayCounter3 = 1;
                    $dayCounter4 = 1;
                    $dayCounter5 = 1;
                    $dayCounter6 = 1;
                    $dayCounter7 = 1;

                    $mondayFuel = 0;
                    $tuesdayFuel = 0;
                    $wednesdayFuel = 0;
                    $thursdayFuel = 0;
                    $fridayFuel = 0;
                    $saturdayFuel = 0;
                    $sundayFuel = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $day = (float)substr($row["StartTidspunkt"], 8, 2);
                            if (($day % 7) == 0) {
                                $mondayFuel += $row["FuelConsume"];
                                $dayCounter1 += 1;
                            }
                            elseif (($day % 7) == 1) {
                                $tuesdayFuel += $row["FuelConsume"];
                                $dayCounter2 += 1;
                            }
                            elseif (($day % 7) == 2) {
                                $wednesdayFuel += $row["FuelConsume"];
                                $dayCounter3 += 1;
                            }
                            elseif (($day % 7) == 3) {
                                $thursdayFuel += $row["FuelConsume"];
                                $dayCounter4 += 1;
                            }
                            elseif (($day % 7) == 4) {
                                $fridayFuel += $row["FuelConsume"];
                                $dayCounter5 += 1;
                            }
                            elseif (($day % 7) == 5) {
                                $saturdayFuel += $row["FuelConsume"];
                                $dayCounter6 += 1;
                            }
                            elseif (($day % 7) == 6) {
                                $sundayFuel += $row["FuelConsume"];
                                $dayCounter7 += 1;
                            }
                            else {

                            }
                        }
                    }

                    echo ($mondayFuel/$dayCounter1) . ",";
                    echo ($tuesdayFuel/$dayCounter2) . ",";
                    echo ($wednesdayFuel/$dayCounter3) . ",";
                    echo ($thursdayFuel/$dayCounter4) . ",";
                    echo ($fridayFuel/$dayCounter5) . ",";
                    echo ($saturdayFuel/$dayCounter6) . ",";
                    echo ($sundayFuel/$dayCounter7);


                    mysqli_close($conn);
                    ?>
                ]
            }]
        });
    });</script>
</body>
</html>