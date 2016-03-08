<html>
<head>
    <title>CarTracker</title>
    <script src="http://code.highcharts.com/highcharts.js"></script>
</head>
<body>
<?php
$db = mysql_connect("mysql.stud.ntnu.no", "madssst_PU", "12345678");

mysql_select_db("madssst_PUDB", $db);
$result = mysql_query("SELECT * FROM Trip", $db);

for($i = 0; $i <= 2; $i++) {
    printf("Trip ID: %s<br>\n", mysql_result($result, $i, "idTrip"));
    printf("Tidspunkt start: %s<br>\n", mysql_result($result, $i, "StartTidspunkt"));
    printf("Tidspunkt slutt: %s<br>\n", mysql_result($result, $i, "SluttTidspunkt"));
    printf("AvgVehicleSpeed: %s<br>\n", mysql_result($result, $i, "AvgVehicleSpeed"));
    printf("TripLength: %s<br>\n", mysql_result($result, $i, "TripLength"));
    printf("Fuel Level: %s<br>\n", mysql_result($result, $i, "FuelLevel"));
    printf("Fuel Consumed: %s<br>\n", mysql_result($result, $i, "FuelConsume"));
}





//echo $result;
?>

<div id="container" style="width:100%; height:400px;"></div>





</body>
</html>




