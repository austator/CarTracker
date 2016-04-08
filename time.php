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
                text: 'Gjennomsnittlig Tidsbruk Per Tur Per Måned',
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
                    text: 'Tid (minutter)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' min'
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

                    $januarySeconds = 0;
                    $januaryMinutes = 0;
                    $januaryHours = 0;
                    $januaryTotMin = 0;

                    $februarySeconds = 0;
                    $februaryMinutes = 0;
                    $februaryHours = 0;
                    $februaryTotMin = 0;

                    $marchSeconds = 0;
                    $marchMinutes = 0;
                    $marchHours = 0;
                    $marchTotMin = 0;

                    $aprilSeconds = 0;
                    $aprilMinutes = 0;
                    $aprilHours = 0;
                    $aprilTotMin = 0;

                    $maySeconds = 0;
                    $mayMinutes = 0;
                    $mayHours = 0;
                    $mayTotMin = 0;

                    $juneSeconds = 0;
                    $juneMinutes = 0;
                    $juneHours = 0;
                    $juneTotMin = 0;

                    $julySeconds = 0;
                    $julyMinutes = 0;
                    $julyHours = 0;
                    $julyTotMin = 0;

                    $augustSeconds = 0;
                    $augustMinutes = 0;
                    $augustHours = 0;
                    $augustTotMin = 0;

                    $septemberSeconds = 0;
                    $septemberMinutes = 0;
                    $septemberHours = 0;
                    $septemberTotMin = 0;

                    $octoberSeconds = 0;
                    $octoberMinutes = 0;
                    $octoberHours = 0;
                    $octoberTotMin = 0;

                    $novemberSeconds = 0;
                    $novemberMinutes = 0;
                    $novemberHours = 0;
                    $novemberTotMin = 0;

                    $decemberSeconds = 0;
                    $decemberMinutes = 0;
                    $decemberHours = 0;
                    $decemberTotMin = 0;


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $month = (float)substr($row["StartTidspunkt"], 5, 2);
                            if ($month == 1) {
                                $januaryHours += (float)substr($row['TripTime'], 0, 2);
                                $januaryMinutes += (float)substr($row['TripTime'], 3, 2);
                                $januarySeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter1 += 1;
                                $januaryTotMin += $januarySeconds / 60 + $januaryMinutes + $januaryHours * 60;
                            } elseif ($month == 2) {
                                $februaryHours += (float)substr($row['TripTime'], 0, 2);
                                $februaryMinutes += (float)substr($row['TripTime'], 3, 2);
                                $februarySeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter2 += 1;
                                $februaryTotMin += $februarySeconds / 60 + $februaryMinutes + $februaryHours * 60;
                            } elseif ($month == 3) {
                                $marchHours += (float)substr($row['TripTime'], 0, 2);
                                $marchMinutes += (float)substr($row['TripTime'], 3, 2);
                                $marchSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter3 += 1;
                                $marchTotMin += $marchSeconds / 60 + $marchMinutes + $marchHours * 60;
                            } elseif ($month == 4) {
                                $aprilHours += (float)substr($row['TripTime'], 0, 2);
                                $aprilMinutes += (float)substr($row['TripTime'], 3, 2);
                                $aprilSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter4 += 1;
                                $aprilTotMin += $aprilSeconds / 60 + $aprilMinutes + $aprilHours * 60;
                            } elseif ($month == 5) {
                                $mayHours += (float)substr($row['TripTime'], 0, 2);
                                $mayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $maySeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter5 += 1;
                                $mayTotMin += $maySeconds / 60 + $mayMinutes + $mayHours * 60;
                            } elseif ($month == 6) {
                                $juneHours += (float)substr($row['TripTime'], 0, 2);
                                $juneMinutes += (float)substr($row['TripTime'], 3, 2);
                                $juneSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter6 += 1;
                                $juneTotMin += $juneSeconds / 60 + $juneMinutes + $juneHours * 60;
                            } elseif ($month == 7) {
                                $julyHours += (float)substr($row['TripTime'], 0, 2);
                                $julyMinutes += (float)substr($row['TripTime'], 3, 2);
                                $julySeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter7 += 1;
                                $julyTotMin += $julySeconds / 60 + $julyMinutes + $julyHours * 60;
                            } elseif ($month == 8) {
                                $augustHours += (float)substr($row['TripTime'], 0, 2);
                                $augustMinutes += (float)substr($row['TripTime'], 3, 2);
                                $augustSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter8 += 1;
                                $augustTotMin += $augustSeconds / 60 + $augustMinutes + $augustHours * 60;
                            } elseif ($month == 9) {
                                $septemberHours += (float)substr($row['TripTime'], 0, 2);
                                $septemberMinutes += (float)substr($row['TripTime'], 3, 2);
                                $septemberSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter9 += 1;
                                $septemberTotMin += $septemberSeconds / 60 + $septemberMinutes + $septemberHours * 60;
                            } elseif ($month == 10) {
                                $octoberHours += (float)substr($row['TripTime'], 0, 2);
                                $octoberMinutes += (float)substr($row['TripTime'], 3, 2);
                                $octoberSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter10 += 1;
                                $octoberTotMin += $octoberSeconds / 60 + $octoberMinutes + $octoberHours * 60;
                            } elseif ($month == 11) {
                                $novemberHours += (float)substr($row['TripTime'], 0, 2);
                                $novemberMinutes += (float)substr($row['TripTime'], 3, 2);
                                $novemberSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter11 += 1;
                                $novemberTotMin += $novemberSeconds / 60 + $novemberMinutes + $novemberHours * 60;
                            } elseif ($month == 12) {
                                $decemberHours += (float)substr($row['TripTime'], 0, 2);
                                $decemberMinutes += (float)substr($row['TripTime'], 3, 2);
                                $decemberSeconds += (float)substr($row['TripTime'], 6, 2);
                                $monthCounter12 += 1;
                                $decemberTotMin += $decemberSeconds / 60 + $decemberMinutes + $decemberHours * 60;
                            } else {

                            }
                        }
                    }

                    echo ($januaryTotMin / $monthCounter1) . ",";
                    echo ($februaryTotMin / $monthCounter2) . ",";
                    echo ($marchTotMin / $monthCounter3) . ",";
                    echo ($aprilTotMin / $monthCounter4) . ",";
                    echo ($mayTotMin / $monthCounter5) . ",";
                    echo ($juneTotMin / $monthCounter6) . ",";
                    echo ($julyTotMin / $monthCounter7) . ",";
                    echo ($augustTotMin / $monthCounter8) . ",";
                    echo ($septemberTotMin / $monthCounter9) . ",";
                    echo ($octoberTotMin / $monthCounter10) . ",";
                    echo ($novemberTotMin / $monthCounter11) . ",";
                    echo($decemberTotMin / $monthCounter12);

                    //mysqli_close($conn);
                    ?>
                ]
            }]
        });
    });</script>

<script>$(function () {
        $('#dayFuel').highcharts({
            title: {
                text: 'Gjennomsnittlig Tidbruk Per Tur Per Dag',
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
                    text: 'Tidsbruk (minutter)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' min'
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

                    $mondaySeconds = 0;
                    $mondayMinutes = 0;
                    $mondayHours = 0;
                    $mondayTotMin = 0;

                    $tuesdaySeconds = 0;
                    $tuesdayMinutes = 0;
                    $tuesdayHours = 0;
                    $tuesdayTotMin = 0;

                    $wednesdaySeconds = 0;
                    $wednesdayMinutes = 0;
                    $wednesdayHours = 0;
                    $wednesdayTotMin = 0;

                    $thursdaySeconds = 0;
                    $thursdayMinutes = 0;
                    $thursdayHours = 0;
                    $thursdayTotMin = 0;

                    $fridaySeconds = 0;
                    $fridayMinutes = 0;
                    $fridayHours = 0;
                    $fridayTotMin = 0;

                    $saturdaySeconds = 0;
                    $saturdayMinutes = 0;
                    $saturdayHours = 0;
                    $saturdayTotMin = 0;

                    $sundaySeconds = 0;
                    $sundayMinutes = 0;
                    $sundayHours = 0;
                    $sundayTotMin = 0;


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $day = (float)substr($row["StartTidspunkt"], 8, 2);
                            if (($day % 7) == 0) {
                                $mondayHours += (float)substr($row['TripTime'], 0, 2);
                                $mondayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $mondaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter1 += 1;
                                $mondayTotMin += $mondaySeconds / 60 + $mondayMinutes + $mondayHours * 60;
                            } elseif (($day % 7) == 1) {
                                $tuesdayHours += (float)substr($row['TripTime'], 0, 2);
                                $tuesdayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $tuesdaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter2 += 1;
                                $tuesdayTotMin += $tuesdaySeconds / 60 + $tuesdayMinutes + $tuesdayHours * 60;
                            } elseif (($day % 7) == 2) {
                                $wednesdayHours += (float)substr($row['TripTime'], 0, 2);
                                $wednesdayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $wednesdaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter3 += 1;
                                $wednesdayTotMin += $wednesdaySeconds / 60 + $wednesdayMinutes + $wednesdayHours * 60;
                            } elseif (($day & 7) == 3) {
                                $thursdayHours += (float)substr($row['TripTime'], 0, 2);
                                $thursdayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $thursdaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter4 += 1;
                                $thursdayTotMin += $thursdaySeconds / 60 + $thursdayMinutes + $thursdayHours * 60;
                            } elseif (($day % 7) == 4) {
                                $fridayHours += (float)substr($row['TripTime'], 0, 2);
                                $fridayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $fridaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter5 += 1;
                                $fridayTotMin += $fridaySeconds / 60 + $fridayMinutes + $fridayHours * 60;
                            } elseif (($day % 7) == 5) {
                                $saturdayHours += (float)substr($row['TripTime'], 0, 2);
                                $saturdayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $saturdaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter6 += 1;
                                $saturdayTotMin += $saturdaySeconds / 60 + $saturdayMinutes + $saturdayHours * 60;
                            } elseif (($day % 7) == 6) {
                                $sundayHours += (float)substr($row['TripTime'], 0, 2);
                                $sundayMinutes += (float)substr($row['TripTime'], 3, 2);
                                $sundaySeconds += (float)substr($row['TripTime'], 6, 2);
                                $dayCounter7 += 1;
                                $sundayTotMin += $sundaySeconds / 60 + $sundayMinutes + $sundayHours * 60;
                            } else {

                            }
                        }
                    }

                    echo ($mondayTotMin / $dayCounter1) . ",";
                    echo ($tuesdayTotMin / $dayCounter2) . ",";
                    echo ($wednesdayTotMin / $dayCounter3) . ",";
                    echo ($thursdayTotMin / $dayCounter4) . ",";
                    echo ($fridayTotMin / $dayCounter5) . ",";
                    echo ($saturdayTotMin / $dayCounter6) . ",";
                    echo ($sundayTotMin / $dayCounter7) . ",";


                    mysqli_close($conn);
                    ?>

                ]
            }]
        });
    });</script>
</body>
</html>